<?php
namespace App\Core;

use \App\Core\Mvc;

class View {

    public string $layout = 'default';

    public function __construct(public Mvc $mvc) {}

    // rimpiazziamo i placeholder nelle pagine php
    public function render($page, $values = ['message'=> '']) {
        $page = str_replace('.','/',$page);

        $layoutValue = [
            'page' => $page,
            'menu' => $this->mvc->config['menu'],
        ];
   
        //ricerca layouts e page
        $layoutContent = $this->getViewContent("layouts", $this->layout, $layoutValue);
        $pageContent = $this->getViewContent("pages",$page, $layoutValue);

        // Ricambia Includes 
         $pageContent = $this->processIncludes($pageContent);
         $layoutContent = $this->processIncludes($layoutContent);
        
        //sostituzione dei placelholder {{page}} con un file.php
        $pageContent = $this->renderContent($pageContent, $values);
        return $this->renderContent($layoutContent, [
            'page' => $pageContent,
            'footer' => "Applicazione web MVC con PHP"
        ]);
    }

    

    /**
     * Summary of renderContent
     * @param mixed $content // contenuto della pagina
     * 
     * @param mixed $values //valori da inserire
     * @return array|string // ritorno di str_rpleace() per ricevere 
     * il file con rimpiazzamento dei placeholder con il file o variabile inserita 
     * nel controller come array/stringa inniettato nel controller interessato
     */
    private function renderContent($content, $values) {
        $chiavi = array_keys($values);
        $chiavi = array_map(fn($chiave) => "{{".$chiave."}}", $chiavi);        
        foreach($values as $key => $value) {            
            if($value instanceof Component) {
                $values[$key] = $this->renderComponent($value);
            }
        }
        $valori = array_values($values);
        return str_replace($chiavi, $valori, $content);
    }

    public function renderComponent($componente) {
        $nomeComponente = $componente->getName();
        $componentContent = $this->getViewContent("components", $nomeComponente);
        $content = '';
        foreach($componente->getItems() as $item) {
            $content .= $this->renderContent($componentContent, $item);
        }
        return $content;
    }

    /**
     * @param mixed $folder // folder: inserisci il valore come stringa per trovare il percorso
     * @param mixed $page // pagina finale (variabile non obbligatoria) 
     * @return bool|string ritorna il percorso specifico del file
     * 
     */

    private function getViewContent($folder, $item, $values = []) {
        extract($values);
        $views = $this->mvc->config['folder']['views'];
        ob_start();
        include "$views/$folder/$item.php";
        return ob_get_clean();
    }


    /**
     * Summary of processIncludes
     * 
     * Questo metodo permette di sostituire gli elementi nelle pagine scelte inniettate nel metodo.
     * Tutti gli elementi all'interno della pagina definiti @include('percorso.della.pagina') verranno sostituiti con
     * l'altra pagina scelta all'intenro di @include
     * 
     * @param string $content può essere layout che page che si trovano in views/page e views/layout 
     * @return string 
     * 
     */
    private function processIncludes($content)
    {
        // definisci il pattern dell'espressione regolare
        $pattern = '/@include\(\s*\'([^\']+)\'\s*\)/';

        // esegui il match
        if (preg_match_all($pattern, $content, $matches)) {
            // estrai e sostituisci tutti i contenuti trovati
            foreach ($matches[1] as $includeContent) {
                $includePath = $includeContent; //definisci il percorso del file incluso
                $strReplaceIncludePath = str_replace('.', '/', $includePath);
                $includeFileContent = $this->getViewContent('', $strReplaceIncludePath); //trova il percoro;

                if ($includeFileContent !== null) {
                    $content = str_replace("@include('$includeContent')", $includeFileContent, $content);
                } else {
                    echo "File incluso non trovato: $includePath<br>";
                }
            }
        }
        return $content;
    } 

}
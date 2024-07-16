<?php
/**
 * 
 * Questa classe mostra le cartelle della pagina 
 */
namespace App\Core;

use App\Core\Mvc;

class View{

    public string $layout = 'default';

    //ricevimo l'istanza MVC
    public function __construct(public Mvc $mvc) {
    }

    

    public function reder($page, $values= []){   

        $layoutValue = [
            'page' => $page,
            'menu' => $this->mvc->config['menu'],
        ];

       //ricerca della layouts e della page
        $layoutContent = $this->getViewContent("layouts",$this->layout, $layoutValue);
        $pageConntent = $this->getViewContent("pages",$page);

         // sostituzione dinamica del file php dov'è presente '{{page}}'

        $pageContent = $this->renderContent($pageConntent, $values);


      

      
        
        $pageContent = $this->processIncludes($pageContent);

         
        //rimpiazzamento placeholder all'interno delle pagine
        $content = $this->renderContent($layoutContent, [
            'page' => $pageContent,
            'footer' => "MVC page",

         ]);

     

        echo $content;
     
    }

    /**
     * Summary of renderContent
     * @param mixed $content //contenuto della pagina inserito all'interno di render
     * @param array $values // valori da sostituire es: {{page}} => 'pagina con valori'
     * @return array|string
     */
    private function renderContent($content, array $values){
        // mappamento delle chiavi valore
        $chiavi = array_keys($values);
        $chiavi = array_map(fn($chiave) => "{{".$chiave."}}" , $chiavi ); //modifiche alla stringa dei placeholder 
        $valori = array_values($values); //ritorno come valore chiave
        $content = str_replace($chiavi, $valori, $content); //ricorso al rimpiazzo dei centenuti su cui operare
        
        return $content;
    }

  
    /**
     * 
     * 
     * @param mixed $folder // folder: inserisci il valore come stringa per trovare il percorso
     * @param mixed $page // pagina finale (variabile non obbligatoria) 
     * @return bool|string ritorna il percorso specifico del file
     * 
     * 
     */
    private function getViewContent(string $folder, string $item = '', array $values = []) {
        extract($values);
        $views = $this->mvc->config['folder']['views'];
        // condizione nel caso $page non fosse presente
        ob_start(); //tieni in memoria (buffering)
        if(empty($item)) {
            $path = "$views/$folder.php";
        } else {
            $path =  "$views/$folder/$item.php";
        }
        include $path;
        return ob_get_clean();
    }
    

    // trova gli @include
      // Verifica e gestisce gli '@include' nel contenuto della pagina
      private function processIncludes($content) {
        // definisci il pattern dell'espressione regolare
        $pattern = '/@include\(\s*\'([^\']+)\'\s*\)/';
    
        // esegui il match
        if (preg_match_all($pattern, $content, $matches)) {
            // estrai e sostituisci tutti i contenuti trovati
            //var_dump($matches); exit();
            foreach ($matches[1] as $includeContent) {
                $includePath = $includeContent; //definisci il percorso del file incluso
                $strReplaceIncludePath = str_replace('.','/',$includePath); 
                $includeFileContent = $this->getViewContent('',$strReplaceIncludePath); //trova il percoro;
                
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
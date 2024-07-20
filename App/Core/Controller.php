<?php
namespace App\Core;
use \App\Core\Mvc;
/**
 *  sommario di Controller
 * 
 * Tramite questa classe diamo la  base per 
 * i controllers che estenderanno questa classe
 * 
 * 
 */

class Controller {

    public function __construct(public Mvc $mvc) {
    }

        /**
     * reindirizzamento alla cartella
     * @var $view inserire il file con estensione php per
     * visualizzare la pagina
     * @var array $values  
     * All'interno di questo array insieramo  tutti i valori che sostituiranno 
     * i placceholders. esempio {{page}} verrà sostituiro da una variabile con indice page presente in un array
     *  
     * per maggiori particolari,andare nel file View presente su /App/Core/View
     */
    public function render($view, $values = []) {
        $content = $this->mvc->view->render($view, $values);
        $this->mvc->response->setContent($content);
    }


    /**
     * Modifica il Layout della pagina
     */

     protected function setLayout(string $layout){
        if(str_contains($layout, '.php')){
            $layout =  str_replace('.php','',$layout);
        }
       // echo $layout; exit;

        $this->mvc->view->layout = $layout;
     }
}
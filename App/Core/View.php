<?php
/**
 * 
 * Questa classe mostra le cartelle della pagina 
 */
namespace App\Core;

use App\Core\Mvc;

class View{

    public string $layout = 'default';

    public function __construct(public Mvc $mvc) {
    }

    

    public function reder($page){
       // echo $this->layout;

       //percorso cartella views
        $viewsFolder = $this->mvc->config['folder']['views']; // percorso
       
       $layoutFilePath = $viewsFolder.'/layouts/'.$this->layout; //percorso completo
        
       
        $pageLayout = '/layouts/'.$this->layout.'.html'; // layout impostato da visualizzare
        $pageConntent =  '/pages/'.$page.'.html'; //contenuto da mostrare

        $layoutContent = file_get_contents(
            $viewsFolder. $pageLayout
        );
        $resultPageContent = file_get_contents(
            $viewsFolder.$pageConntent
        );

        /*
         echo $layoutContent; // visualizzazione layout
        echo $resultPageContent; // visualizzazione pagina 
         */

         // sostituzione dinamica del file html dov'è presente '{{page}}'
        $content = str_replace('{{page}}',$resultPageContent, $layoutContent);

        echo $content;
    }
}
<?php
namespace App\Core;


use App\Core\Mvc;

class Controller{

    protected array $data = []; // Per memrorizzare i dati passati su controller

    public function __construct(public Mvc $mvc){
        Mvc::$mvc->view;
    }

    /**
     * reindirizzamento alla cartella
     * @var $view inserire il file con estensione html per 
     */

    protected function render($view, $contents = []){
        //reindirizzaento alla cartella views con il file scelto fitra le variabili tra pages e orm e quant'altro
       $renderContent = $this->mvc->view->render($view, $contents);
       
        $this->mvc->response->setContent( $renderContent);

    }

    

   
}
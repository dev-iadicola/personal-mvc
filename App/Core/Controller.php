<?php
namespace App\Core;


use App\Core\Mvc;

class Controller{
    public function __construct(public Mvc $mvc){
        Mvc::$mvc->view;
    }

    /**
     * reindirizzamento alla cartella
     * @var $view inserire il file con estensione html per 
     */

    public function render($view){
        //reindirizzaento alla cartella views con il file scelto
       $this->mvc->view->reder($view);
    }
}
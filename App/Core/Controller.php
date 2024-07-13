<?php
namespace App\Core;


use App\Core\Mvc;

class Controller{
    public function __construct(public Mvc $mvc){}

    public function render($view){
        //reindirizzaento view alla cartella views
       $this->mvc->view->reder($view);
    }
}
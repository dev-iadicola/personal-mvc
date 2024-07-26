<?php

namespace App\Controllers;
use \App\Core\Controller;
use \App\Core\Mvc;

class LawController extends Controller {

    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
        
     
    }

    public function cookie() {
        // recupero dati dal database
        $descrizioneInDB = "Descrizione della home page";

        $this->render('laws.cookie-law', []);
    }

    public function policy(){
        $this->render('laws.policy',[]);
    }

}
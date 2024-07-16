<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Mvc;

class ContattiController extends Controller {
    public function __construct( public Mvc $mvc){
        parent::__construct($mvc);
    }

    public function index(){
        // gestione richiesta get
        $this->render('contatti',[
            'message' => '',      
        ]);
    }

    public function create(){
        // gestione richiesta post

        $this->render('contatti', [
            'message' => 'Il messaggio è stato inviato!!',
        ]);

    }
}
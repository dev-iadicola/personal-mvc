<?php
/**
 * 
 * Sommario HomeContrller:
 *  
 * Questa classe indica tra rotte e variabili
 * 
 */
namespace App\Controllers;
use \App\Core\Controller;
use \App\Core\Mvc;

class HomeController extends Controller {

    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
    }

    public function index() {
        // recupero dati dal database
        $descrizioneInDB = "Descrizione della home page";

        $this->render('home', [
            'descrizione' => $descrizioneInDB
        ]);
    }

}
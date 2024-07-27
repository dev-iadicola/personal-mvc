<?php
namespace App\Controllers;
use \App\Core\Controller;
use \App\Core\Component;
use \App\Core\Mvc;

use App\Model\Contatti;

class ProgettiController extends Controller {

    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
    }

    public function index() {
        $this->render('progetti');
    }

    /**
     * Summary of getFormComponent
     * 
     * Inseriamo i componenti da inserire per sostotuire i placeholder
     */
    

   



}
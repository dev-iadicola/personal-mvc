<?php
namespace App\Controllers;
use App\Core\ORM;
use \App\Core\Mvc;
use App\Model\Skill;
use App\Model\Article;
use App\Model\Profile;
use App\Model\Project;
use \App\Core\Controller;
use App\Model\Curriculum;
use App\Model\Certificato;

class HomeController extends Controller {

    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
        
     
    }

    public function index() {
        // recupero dati dal database

    
        $message = "";

        $this->render('home' );
    }

  
    
    

}
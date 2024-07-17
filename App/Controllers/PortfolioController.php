<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Core\Mvc;
use App\Core\View;
use App\ORM\Portfolio;


class PortfolioController extends Controller {
    public function __construct( public Mvc $mvc){
        parent::__construct($mvc);
    }

    public function index(){

        $portfolioModel = new Portfolio($this->mvc->pdo);
        $items = $portfolioModel->findAll('portfolio');

       // var_dump($items);
    
      
      
        
        $this->render('portfolio', compact('items'));
    
    }
}
<?php
namespace App\Controllers;
use \App\Core\Controller;
use \App\Core\Component;
use \App\Core\Mvc;
use App\Model\Portfolio;

class PortfolioController extends Controller {

    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
    }

    public function index() {
        $portfolioModel = Portfolio::findAll();
        $items = $portfolioModel;

        $this->render('portfolio', [
            'showportfolio' => $this->getPortfolioComponent($items)
        ]);
    }

    private function getPortfolioComponent($items) {
        $portfolio = new Component('portfolioitem');
        $portfolio->setItems($items);
        return $portfolio;
    }

}
<?php
namespace App\Controllers\Admin;
use App\Core\Controller;
use App\Core\Http\Request;
use App\Core\Mvc;
use App\Core\Services\AuthService;

class PortfolioController extends Controller{

    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
        
        $this->setLayout('admin');
        
    }

    public function index(){
        $this->render('admin.portfolio');
    }

  public function create(Request $request){
    var_dump($request);

  }

}
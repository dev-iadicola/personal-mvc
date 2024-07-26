<?php
namespace App\Controllers\Admin;
use App\Core\Controller;
use App\Core\Mvc;

class DashBoardController extends Controller{

    public function __construct(public Mvc $mvc) {
        parent::__construct($mvc);
        
        $this->setLayout('admin');
        
    }

    public function index(){
        $this->render('admin.dashboard');
    }

}
<?php

namespace App\Core;

class Middleware{
    public function __construct(
        public Mvc $mvc,
        public array $queueForBaseRoute = [],
        public array $queueRoute = []
    ){
       
    }

    public function register($middleware){
        array_push($this->queueRoute, $middleware);
    }

    public function execute(){
        
    }
}
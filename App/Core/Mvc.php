<?php

# il Bootstrap dell'applicazione

class Mvc
{

    // proprietà pubbliche 

    public $request;
    public $response;
    public $router;

    public function __construct(
        public array $routes
    ) {
        echo 'Bootstrap of the app ';

        $this->request = new Request();
        $this->response = new Response();
       $this->router = new Router(
        request: $this->request, 
        routes: $this->routes
       );

        //$richiesta = $_SERVER['REQUEST_URI'];
        //echo $routes[$richiesta] ?? 'Page not found.';
    }
}

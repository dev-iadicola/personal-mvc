<?php

# il Bootstrap dell'applicazione



class Mvc
{

   

    public $request;
    public $response;
    public $router;

    public function __construct(
        public array $routes
    ) {
        
        // instanza delle classi essenziali per il core dell'applicazione

        //metodo services cointainer 
        $this->request = new Request();
        $this->response = new Response();
        $this->router = new Router(
            request: $this->request,
            routes: $this->routes
        );
    }
}

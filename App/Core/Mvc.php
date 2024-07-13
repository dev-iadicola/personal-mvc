<?php
# il Bootstrap dell'applicazione

namespace App\Core;

use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Router;
use App\Core\View;




class Mvc
{

    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;

    public function __construct(
        public array $config
    ) {
        $this->config;
        
        // instanza delle classi essenziali per il core dell'applicazione

        //metodo services cointainer 
        $this->request = new Request();
        $this->response = new Response();
        $this->view = new View();

        // garantisce che richieste http e routes corrispondano 
        $this->router = new Router($this);
    }

    public function run(){
        $this->router->resolve();
    }
}

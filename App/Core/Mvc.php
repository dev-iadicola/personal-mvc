<?php
# il Bootstrap dell'applicazione

namespace App\Core;

use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Router;
use App\Core\View;




class Mvc
{

    public static $mvc;
    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;

    public function __construct(
        public array $config
    ) {
        self::$mvc = $this;
        $this->config;
        
        // creazioni instanze essenziali per il core dell'applicazione
       
        //metodo services cointainer 
        $this->request = new Request();
        $this->response = new Response();

        /**
         * innettiamo tutta l'istanza dell'oggetto MVC
         * per entrambi gli ultimi oggetti
         * View e Router
         */
        $this->view = new View($this);

        // garantisce che richieste http e routes corrispondano 
        $this->router = new Router($this);
    }

    public function run(){
        // utilizzo il metodo della classe Router
        $this->router->resolve();
    }
}

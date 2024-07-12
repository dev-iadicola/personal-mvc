<?php
/**
 * 
 * invocato il metood resolve
 */

namespace App\Core\Http;


class Router{
     public function __construct(
        public Request $request, 
        public array $routes
        ) {
            
        $this->resolve();

    }

    public function resolve(){
        // il metodo verifica la tipologia di richiesta (GET o POST)
        $method = $this->request->getRequestMethod(); //prendiamo il metodo
        $path = $this->request->getRequestPath();
        $response = $this->routes[$method][$path] ?? false; 
       // visualizza se la risorsa nel ffile routes è presente nell'array
       //altrimenti risulterà una pagina non trovata
        if(!$response){
        echo 'Page not found';
       }else{
        echo $response;
       }
    }
}
<?php
namespace App\Core\Http;

/**
 * 
 * Classe Router che gestisce il routing delle richieste HTTP
 * La classe asscia una richiesta HTTP a un determinato controller e metodo rendendo 
 * quest'ultimo un 'action' per la request
 *  
 * invocatozione del metodo resolve nel costruttore.
 * 
 */



use App\Core\Http\Request;
use App\Core\Mvc;

class Router
{
    public function __construct(public Mvc $mvc) {
    }

    public function getRoute(){

        // otteiene il metodo HTTP della richiesta (GET o POST)
        $method = $this->mvc->request->getRequestMethod(); //prendiamo il metodo
        // Ottienne il percorso URI della richiesta. es: '/home'
        $path = $this->mvc->request->getRequestPath(); // prendiamo la stringa per la request URI effettuata dall'utente
        $route = $this->mvc->config['routes'];
        return  $route[$method][$path] ?? false;
    }
           
    // il metodo verifica la richiesta HTTP
    public function resolve()
    {
       $response = $this->getRoute();

       //var_dump($response);
         // Verifica se la combinazione metodo/percorso esiste nelle rotte definite
        // Se non esiste, viene restituito false e la pagina "Page not found 404" viene visualizzata
        if (!$response) {
            echo 'Page not found';
        } else {
            // Se la rotta esiste, prendiamo il controller e il metodo da chiamare
            
            $controller = $response[0]; //il controller
            $action = $response[1]; // l'action

 
            //creazione istanza del controller selezionato
            $instance = new $controller($this->mvc);

            call_user_func_array([$instance, $action], []); //invocazione metodo 

        }
    }
}

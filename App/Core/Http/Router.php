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
    public function __construct(public Mvc $mvc)
    {
    }

    /**
     *
         Cerca all'interno del file 'config/routes.php'
         la presenza del metodo associato alla richiesta URI

     */
    public function getRoute()
    {

        // otteiene il metodo HTTP della richiesta (GET o POST)
        $method = $this->mvc->request->getRequestMethod(); //prendiamo il metodo
        // Ottienne il percorso URI della richiesta. es: '/home'
        $path = $this->mvc->request->getRequestPath(); // prendiamo la stringa per la request URI effettuata dall'utente
        $route = $this->mvc->config['routes'];
        return  $route[$method][$path] ?? false; //risposta
    }

    // il metodo verifica la richiesta HTTP
    public function resolve()
    {

        $response = $this->getRoute();


        //se metodo HTTP e la request URI non sono presenti ritorna una pagina di error 404
        if (!$response) {
            echo 'Page not found 404';
        } else {

            // Se la rotta esiste, prendiamo il controller e il metodo da chiamare
            $controller = $response[0]; //il controller
            $action = $response[1]; // l'action

            //creazione istanza del controller selezionato
            $instance = new $controller($this->mvc); //passiamo in input tutta l'istanza MVC 


            call_user_func_array([$instance, $action], []); // azione del controller 

        }
    }
}

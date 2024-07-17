<?php
# il Bootstrap dell'applicazione
 
/**
 * 
 * Un pattern MVC basato sul services container
 */
namespace App\Core;

use App\Core\Exception\NotFoundException;
use App\Core\Http\Request;
use App\Core\Http\Response;
use App\Core\Http\Router;
use App\Core\View;

use App\Core\Database;
use PDO;
use PDOException;

class Mvc
{

    public static Mvc $mvc;
    public Request $request;
    public Response $response;
    public Router $router;
    public View $view;
    public PDO $pdo;

    /**
     * 
     * Creazione istanze per il core dell'applicazione
     * 
     * @param array $config
     */
    public function __construct(public array $config) {
        self::$mvc = $this;
        $this->config = $config;
        
        // Gestione delle request
        $this->request = new Request();

        /**
         * innettiamo tutta l'istanza dell'oggetto MVC
         * per entrambi gli ultimi oggetti
         * View e Router
         */

        // gestione delle pagine web con include, componets e rimpiazzamento placeholders
        $this->view = new View($this);

        // Gestione delle risposte per il client
        $this->response = new Response($this->view);


        // Garantisce che le richieste http e routes corrispondino 
        $this->router = new Router($this);

        $this->getPdoConnection(); // Otteniamo una connessione al database
    }

    /**
     * Summary of getPdoConnection:
     * 
     * gestiamo gli errori di connessione
     * @return void
     */
    private function getPdoConnection(){
        try{
          $this->pdo =  (new Database())->pdo;
        }catch(PDOException $e){
            echo "Errore server $e"; exit;
        }
    }

    /**
     * 
     * Gestione delle richieste, il vero "main.php" per lo sviluppo ad oggetti
     * @return void
     */
    public function run(){
        // verifichiamo se la richiesta è presente nel file routes.php
        try{
            $this->router->resolve(); // risolviamo le richieste
        }catch( NotFoundException $e ){
            // se la richiesta non esiste all'intenro del software, l'utente verrà indirizzato alla pagina di error 404
            $this->response->send404($e);
        }

        $this->response->send(); //inviamo la risposta al client
    }
}

<?php

namespace App\Core;

use App\Core\ORM;
use \App\Core\View;
use App\Mail\Mailer;
use App\Core\Middleware;
use App\Core\UploadFile;
use \App\Core\Http\Router;
use \App\Core\Http\Request;
use \App\Core\Http\Response;
use App\Core\Connection\SMTP;
use \App\Core\Connection\Database;
use App\Core\Services\SessionService;
use \App\Core\Exception\NotFoundException;
use PHPMailer\PHPMailer\Exception as ExceptionSMTP;

class Mvc{
    public static Mvc $mvc;


    public Request $request;
    public Response $response; 
        public Router $router; 
    public View $view; 

    public UploadFile $uploadFile;
    public \PDO $pdo; 

    public SMTP $Smtp;
    public Mailer $mailer;

    public Middleware  $middleware; 


    public SessionService $sessionService;
    /**
     * Costruttore della classe Mvc
     *
     * @param array $config Configurazione per l'applicazione (es. impostazioni delle routes, view, ecc.)
     */
    public function __construct(public array $config)


    {
        self::$mvc = $this;


        $this->request = new Request();

        $this->view = new View($this);

        $this->uploadFile = new UploadFile($this);


        $this->response = new Response($this->view);

        $this->router = new Router($this);

       

        $this->getPdoConnection(); 
        $this->getSMTPConnection();
        $this->mailer = new Mailer($this);

        Orm::setPDO($this->pdo);

        $this->middleware = new Middleware($this, $config['middleware']);

        $this->sessionService = new SessionService();
    }

    /**
     * Crea una connessione PDO e la assegna alla proprietà $pdo
     * Se la connessione fallisce, stampa un messaggio di errore e termina l'esecuzione
     */
    private function getPdoConnection()
    {
        try {
            // Crea una nuova istanza della classe Database e assegna il PDO
            $this->pdo = (new Database())->pdo;
        } catch (\PDOException $e) {
            // Se c'è un errore di connessione, stampa il messaggio di errore e termina
            echo "Errore di connessione al database: " . $e->getMessage();
            exit;
        }
    }

    private function getSMTPConnection(){
        try{
            $this->Smtp = new SMTP();
        }catch(ExceptionSMTP $e){
            echo "Error connecting to the e-mail service". $e->getMessage();
            exit;
        }
    }

    /**
     * Launch the application, resolving the request and sending the response
     */
    public function run()
    {
        try {
            // Resolves the request, i.e. determines what action to take based on the route
            $this->router->resolve();
        } catch (NotFoundException $e) {
            // If the route is not found, set a 404 response
            $this->response->set404($e);
        }

        // send response 
        $this->response->send();
    }
}

<?php
namespace App\Core\Http;

class Request {
    private string $path;
    private string $method;
    private array $post;

    public function __construct() {
        $this->path = $this->getRequestPath();
        $this->method = $this->getRequestMethod();
        $this->post = $this->getPost();
    }

    // Cattura richiesta post
    public function getPost() {
        return $_POST ?? [];
    }

    // Preleva la request URI
    public function getRequestPath() {
        return $_SERVER['REQUEST_URI'];
    }

    // Cattura il metodo della richiesta
    public function getRequestMethod() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }

    public function getBack()
    {
        // Assicurati che HTTP_REFERER sia impostato
        if (isset($_SERVER['HTTP_REFERER'])) {
            return strtolower($_SERVER['HTTP_REFERER']);
        }
        return null;
    }

    public function redirectBack()
    {
        $backUrl = $this->getBack();
        if (!empty($backUrl)) {
            header("Location: $backUrl");
            exit();
        } else {
            // Gestisci il caso in cui non c'è un URL di riferimento
            header("Location: /"); // Reindirizza alla home page o ad un'altra pagina di default
            exit();
        }
    }
}
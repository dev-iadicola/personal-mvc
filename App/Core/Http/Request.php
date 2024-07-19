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

}
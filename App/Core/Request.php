<?php

/**
 * Sfruttare la richiesta HTTP per riconoscerne il metodo e l'URI
 * 
 * recuperare il metodo
 */
class Request
{

    private string $path;
    private string $method;
    public function __construct()
    {

        $this->path = $this->getRequestPath();
        $this->method = $this->getRequestMethod();
    }

    public function getRequestPath()
    {
        return $_SERVER['REQUEST_URI'];
    }

    public function getRequestMethod()
    {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}

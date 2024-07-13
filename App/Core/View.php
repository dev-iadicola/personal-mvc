<?php
/**
 * 
 * Questa classe mostra le cartelle della pagina 
 */
namespace App\Core;

class View{
    public function __construct() {
    }

    public string $layout = 'default';

    public function reder($page){
        echo $page;
    }
}
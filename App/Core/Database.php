<?php
namespace App\Core;

use PDO;

class Database {
    public PDO $pdo;

    public function __construct()
    {
        define('HOST',getenv('DB_HOST'));
        define('USER',getenv('DB_USER'));
        define('PSW',getenv('DB_PSW'));
        define('NAME', getenv('DB_NAME'));
        

        $_DSN =  "mysql:host=".HOST.";
        dbname=".NAME.";
        charset=utf8";

        $this->pdo = new PDO($_DSN,USER,PSW,[
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_EMULATE_PREPARES => false // maggior sicurezza attacchi SQL injection
        ]);
    }
}
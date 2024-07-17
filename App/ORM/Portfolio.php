<?php

namespace App\ORM;


use App\Core\ORM;
 class Portfolio extends ORM{
    public function __construct(public \PDO $pdo){
        parent::__construct($pdo);
    }
 }
<?php

namespace App\Model;


use App\Core\ORM;

class User extends ORM 
{
    static string $table = 'users';

    static array $fillable = [
        'email', 'password'
    ];




    
}

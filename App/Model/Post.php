<?php

namespace App\Model;


use App\Core\ORM;

class Post extends ORM
{
    static string $table = 'posts';

    static array $fillable = ['id', 'title','description'];

}

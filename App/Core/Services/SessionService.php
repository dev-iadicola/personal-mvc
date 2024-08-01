<?php 
namespace App\Core\Services;
class SessionService{
   
    public static function startSession(){
        if(session_status() == PHP_SESSION_NONE){
            session_start();
            return true;
        }

        return false;
    }

    public static function set($key, $value){
        self::startSession();
        $_SESSION[$key] = $value;

        return self::getAll();

    }

    public static function create(array $arraySession){
        self::startSession();

        foreach($arraySession as $key => $value){
            $_SESSION[$key] = $value;
        }

        return self::getAll();
    }

    public static function getAll(){
        self::startSession();
        return $_SESSION ?? null;
    }

    public static function get( string $key){
        self::startSession();
        return $_SESSION[$key] ?? null;
    }

    public static function unset($key){
        self::startSession();
        unset($_SESSION[$key]);

        return self::getAll() ?? null;
    }

    public static function destroy(){
        self::startSession();
        $_SESSION = [];
        session_unset();
        session_destroy();

        return session_status();
    }


}
<?php

namespace App\Core;

class Config
{

    public static function file($file)
    {
        /**
         * Summary of loadFile
         * @param string $file //string
         * @return bool
         * 
         * verifica che sia un file
         */
        if (!is_file($file)) {
            return false;
        }
        return include $file;
    }
    /**
     * Summary of env
     * @param string $env // il fil .env
     * @return string ritrona il parametro 
     * 
     */
    public static function env($envFile)
    {
        $envVars = file($envFile);
        foreach ($envVars as $envVar) {
            putenv(trim($envVar));
        }
    }

    public static function dir($dir)
    {
        if (!is_dir($dir)) {
            return false;
        }
        $conf = [];
        $files = scandir($dir);
        foreach ($files as $file) {
            if ($file === '.' || $file === '..') continue; // evitiamo di inserire cartella corrente o cartella parent
            $nomeFile = pathinfo($file, PATHINFO_FILENAME);
            $conf[$nomeFile] = include $dir . '/' . $file;
        }
        return $conf;
    }
}

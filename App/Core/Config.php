<?php

namespace App\Core;

class Config
{
    /**
     * Summary of loadFile
     * @param string $file //string
     * @return bool
     * 
     * verifica che sia un file
     */
    public static function file($file)
    {
        // verifica che sia un file
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
        foreach ($envVars as $ev) {
            putenv(trim($ev));
        }
    }

    public static function dir($dir)
    {

        // controllo
        if (!is_dir($dir)) false;

        $conf = [];
        $files = scandir($dir);
        foreach($files as $file){
            if($file == '.' ||  $file == '..') continue; // evitiamo di inserire cartella corrente o cartella parent
            $nomeFile = pathinfo($file, PATHINFO_FILENAME);
            $conf[$nomeFile] = include  $dir.'/'. $file;

        }

        return $conf;
    }
}

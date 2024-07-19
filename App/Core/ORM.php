<?php

namespace App\Core;

/**
 * Un ORM (acronimo di Object-Relational Mapping) 
 * è uno strumento di sviluppo software che agisce 
 * come intermediario tra un 
 * database relazionale e un linguaggio di 
 * programmazione orientato agli oggetti.
 * 
 * Sommario della classe ORM
 * Questa classe deve essere estesa dai futuri ORM creati dai developers.
 * Lo scopo è quello di semplificare lo sviluppo tramite il metodo ORM
 * 
 * 
 * 
 * 
 */

use PDO;
/**
 * Summary of ORM
 * 
 * Classe base per la gestione dei Model
 */
class ORM
{

    protected static string  $table = ''; // nome defaul vuoto
    protected static ?PDO $pdo = null; // connessione PDO

 

    public function __construct( PDO $pdo)
    {
        self::setPDO($pdo);
    }

    
    public static function setPDO(PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    // Imposta il nome della tabella
    public static function setTable(string $nameTab)
    {
        self::$table = $nameTab;
    }

    // Cerca per parametro inserito
    public static function where($columnName, $parameter, $fetchType = PDO::FETCH_ASSOC)
    {
        $table = static::$table;
        $query = "SELECT * FROM $table WHERE $columnName = :parameter";
        $st = self::$pdo->prepare($query);
        $st->bindParam(':parameter', $parameter, PDO::PARAM_STR);
        $st->execute();

        return $st->fetchAll((int)$fetchType);
    }

    // esclude per parametro inserito
    public static function whereNot($columnName, $parameter, $fetchType = PDO::FETCH_ASSOC)
    {
        $table = static::$table;
        $query = "SELECT * FROM $table WHERE NOT $columnName = :parameter";
        $st = self::$pdo->prepare($query);
        $st->bindParam(':parameter', $parameter, PDO::PARAM_STR);
        $st->execute();

        return $st->fetchAll((int)$fetchType);
    }
    
    // cerca tramite id
    public static function find($id, $fetchType = PDO::FETCH_ASSOC)
    {
        $table = static::$table;
        $st = self::$pdo->prepare("SELECT * FROM $table WHERE id=:id");
        $st->bindParam(':id', $id, PDO::PARAM_INT);
        $st->execute();
        return $st->fetch($fetchType);
    }
    
    // cerca tutti
    public static function findAll($fetchType = PDO::FETCH_ASSOC)
    {
        $table = static::$table;
        $st = self::$pdo->prepare("SELECT * FROM $table");
        $st->execute();
        return $st->fetchAll((int)$fetchType);
    }
    
    /**
     * Summary of save
     * 
     * Tramite questo metodo salviamo i dati nel database
     * 
     * @param array $values 
     * // contiene un array associativo, precisamente la richiesta POST effettuata
     * @return bool // ritrona il salvataggio della query nel DB
     */
    public static function save($values)
    {
        // INSERT INTO table (campo1,campo2) VALUES (:campo1,:campo2)
        $table = static::$table;
        
        $keys = array_keys($values); //prendiamo le chiavi della richiesta POST
        $fields = implode(',', $keys); // prendiamo le chiavi e convertiamo in stringa con virgola
        $placeholder = implode( ',',
            array_map(fn ($key) => ":$key", $keys) //inseriamo i punti per bindValue
        );
        $query = "INSERT INTO $table ($fields) VALUES ($placeholder)";
        $stmt = self::$pdo->prepare($query);
        foreach ($values as $field => $fieldValue) {
            $stmt->bindValue(":$field", $fieldValue);
        }
        return $stmt->execute();
    }
}

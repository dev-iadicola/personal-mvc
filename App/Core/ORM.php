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

  
    protected static ?PDO $pdo = null; // connessione PDO

    protected static string  $table = ''; // nome defaul vuoto
    protected static array $fillable = [];
    protected string $whereClause = '';
    protected string $whereNotClause = '';
    protected array $bindings = [];

 

    public function __construct( PDO $pdo)
    {
        self::setPDO($pdo);
    }

    
    public static function setPDO(PDO $pdo)
    {
        self::$pdo = $pdo;
    }

    
    // Cerca per parametro inserito
    public static function where($columnName, $parameter) {
        $columnName = ORM::removeSpecialChars($columnName);
        $parameter = ORM::removeSpecialChars($parameter);

        $instance = new static(self::$pdo);
        $instance->whereClause = "WHERE $columnName = :parameter";
        $instance->bindings[':parameter'] = $parameter;
     
        return $instance;
    }
    public function whereNot($columnName, $parameter)
    {
        $columnName = self::removeSpecialChars($columnName);
        $parameter = self::removeSpecialChars($parameter);

        $this->whereClause = " WHERE NOT $columnName = :parameter";
        $this->bindings[':parameter'] = $parameter;

        return $this;
    }

    public function get($fetchType = PDO::FETCH_ASSOC){
        $query = "SELECT * FORM {$this->table} {$this->whereClause}";
        $st = $this->pdo->prepare($query);

        foreach($this->bindings as $param => $value){
            $st->bindValue($param,$value);
        }

        return $st->fetchAll($fetchType);

    }
    

    public function first($fetchType = PDO::FETCH_ASSOC) {
        $table = static::$table;
        $query = "SELECT * FROM $table {$this->whereClause} LIMIT 1";
        $st = self::$pdo->prepare($query);
        foreach ($this->bindings as $param => $value) {
            $st->bindValue($param, $value);
        }
        $st->execute();
        return $st->fetch($fetchType);
    }
   
    // cerca tramite id
    public static function find($id, $fetchType = PDO::FETCH_ASSOC)
    {
        $id = self::removeSpecialChars($id);

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
    public static function save(array $values)
    {
        $fillable = static::$fillable;

        

         // Filtra valori di values
        if(!empty($fillable)){
           
           $values = array_filter( $values, function($chiave) use ($fillable){
                return in_array($chiave, $fillable);
            }, ARRAY_FILTER_USE_KEY);

        }

       
        // INSERT INTO table (campo1,campo2) VALUES (:campo1,:campo2)
        $table = static::$table;

        foreach($values as $chiave =>$value){
           $values[$chiave] = self::removeSpecialChars($value);
        }
        
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

    /**
     * Summary of removeSpecialChars
     * 
     * Pulisce le stringe dai caratteri speciali
     * @param mixed $input input inserito dall'utente
     * @return string pulita dai caratteri speciali
     */
    public static function removeSpecialChars($input) {
        
        $safe_input = htmlspecialchars($input, ENT_QUOTES, 'UTF-8');
        $clearInput = strip_tags($safe_input);
        return $clearInput;
    }
    
}

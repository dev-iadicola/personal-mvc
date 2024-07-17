<?php
namespace App\Core;
/**
 * Un ORM (acronimo di Object-Relational Mapping) 
 * è uno strumento di sviluppo software che agisce 
 * come intermediario tra un 
 * database relazionale e un linguaggio di 
 * programmazione orientato agli oggetti.
 * 
 */


class ORM{
    public function __construct(public \PDO $pdo){ }

    // Array associativo come risultato dell'intera tabella
    public function findAll(string $table, $fetchType = \PDO::FETCH_ASSOC){
       $query =  $this->pdo->prepare("SELECT * FROM $table");
       $query->execute();
      return (object) $query->fetchAll($fetchType);

    }

    // Array associativo come risultato del singolo record
    public function find(string $table, int $id ,$fetchType = \PDO::FETCH_ASSOC){
        $query = $this->pdo->prepare("SELECT * FROM $table WHERE id = $id");
        $query->bindParam(':id', $id, \PDO::PARAM_INT);
        $query->execute();
        return (object) $query->fetch($fetchType);
    }

    public function where(string $table, $columName,  $param, $fetchType = \PDO::FETCH_ASSOC){
        $query = $this->pdo->prepare("SELECT * FROM $table WHERE $columName = $param");
        $query->bindParam(":$columName", $columName, \PDO::PARAM_STR);
        $query->bindParam(":$param", $param, \PDO::PARAM_STR);
        $query->execute();
        return $query->fetch($fetchType);
    }


}
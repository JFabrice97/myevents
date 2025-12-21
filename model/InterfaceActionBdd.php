<?php

namespace Model;

use Model\ConnectionBdd;

abstract class AbstractActionBdd{
    protected $bdd;
    protected $table;
    public function __construct(){
        $this->bdd = ConnectionBdd::connecter();
    }

    public function save(){
        $fields = get_object_vars($this);
        unset($fields['bdd'], $fields['table']);
        if(empty($fields)){ return false; }
        $columns = implode(", ", array_keys($fields));
        $placeholders = implode(", ", array_map(fn($key) => ":$key", array_keys($fields)));
        $sql = "INSERT INTO {$this->table} ($columns) VALUES ($placeholders)";
        $stmt = $this->bdd->prepare($sql);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        if($stmt->execute()){
            return $this->bdd->lastInsertId();
        }else{
            return false;
        }
    }
    public function update($id){
        $id = (int)$id;
        if($id>0){ return false; }
        $fields = get_object_vars($this);
        unset($fields['bdd'], $fields['table']);
        if(empty($fields)){ return false; }
        $setClause = implode(", ", array_map(fn($key) => "$key = :$key", array_keys($fields)));
        $sql = "UPDATE {$this->table} SET $setClause WHERE id = :id";
        $stmt = $this->bdd->prepare($sql);
        $stmt->bindValue(":id", $id);
        foreach ($fields as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        return $stmt->execute();
    }
    public function getAll(){}
    public function delete(){}
}
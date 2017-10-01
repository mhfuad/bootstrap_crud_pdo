<?php
include 'DB.php';

abstract class Main {
    protected $table;
    
    abstract public function createData();
    abstract public function updateData($id);
    
     public function readById($id){
      $sql = "SELECT * FROM $this->table WHERE id=:id;";
      $stmt = DB::prepare($sql);
      $stmt->bindParam(':id',  $id);
      $stmt->execute();
        return $stmt->fetch();
    }
    public function readAll(){
        $sql = "SELECT * FROM $this->table ";
        $stmt = DB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    
     public function deleteData($id){
      $sql = "delete from $this->table where id=:id;";
      $stmt = DB::prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->execute();
    }
}

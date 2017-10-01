<?php
include 'Main.php';

class student extends Main{
    protected $table = 'crudpdo.tbl_student';
    private $name;
    private $dep;
    private $age;
    //private $id;
    
    public function setDepartment($param) {
      $this->dep = $param;
    }
    /*public function setId($param) {
      $this->id = $param;
    }*/
    public function setName($param) {
      $this->name = $param;
    }
    public function setAge($param) {
      $this->age = $param;
    }
    public function createData() {
      $sql = "INSERT INTO $this->table (name,department,age) values(:name,:department,:age)";
      $stmt = DB::prepare($sql);
      $stmt->bindParam(':name',  $this->name);
      $stmt->bindParam(':department', $this->dep);
      $stmt->bindParam(':age',  $this->age);
      $stmt->execute();
    }
    public function updateData($id){
      $sql = "UPDATE $this->table SET name=:name, department=:dpt, age=:age WHERE id=:id;";
      $stmt = DB::prepare($sql);
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':name', $this->name);
      $stmt->bindParam(':dpt', $this->dep);
      $stmt->bindParam(':age', $this->age);
      $stmt->execute();
    }
   
}

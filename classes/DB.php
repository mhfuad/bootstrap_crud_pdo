<?php
include 'config.php';

class DB {
    private static $pdo;
    
    public static function connect(){
        if (!isset(self::$pdo)) {
            try {
                self::$pdo = new PDO('mysql:host'.DB_HOST.'; dbname:'.DB_NAME.";",DB_USER,DB_PASS);
            } catch (PDOException $exc) {
                echo "<h1>Not connect</h1>".$exc->getMessage();
            }
        }
        return self::$pdo;
    }
    public static function prepare($sql){
        return self::connect()->prepare($sql);
    }
}

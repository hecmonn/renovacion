<?php
class Database {
    public $con;

    public function __construct(){
        $this->connect();
    }
    private function connect(){
        define('HOST','localhost');
        define('USER','root');
        define('PASSWORD','admin');
        define('DATABASE','renovacion');
        $this->con=mysqli_connect(HOST,USER,PASSWORD,DATABASE);
        if(mysqli_errno($this->con)){
            die("Cannot connect to database");
        }
    }
}

$Database=new Database();
?>

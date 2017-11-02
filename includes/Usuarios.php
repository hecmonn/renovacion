<?php
require_once "DbObjects.php";
class Usuarios extends DbObjects {
    public $id;
    public $usuario;
    public $password;
    public $type;
    public static $table="usuarios";
}
$Usuario=new Usuarios();

?>

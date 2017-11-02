<?php
require_once "DbObjects.php";
class Alumnos extends DbObjects {
    public $id;
    public $nombre;
    public $apellido;
    public $direccion;
    public $colegiatura;
    public $bod;
    public $fecha_ingreso;
    public static $table="alumnos";


}
$Alumnos=new Alumnos();
?>

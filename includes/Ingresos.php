<?php
require_once 'DbObjects.php';

class Ingresos extends DbObjects {
    private $id;
    public $tipo;
    public $descripcion;
    public $monto;
    public $did;
    public $aid;
    public static $table="ingresos";
}

$Ingreso=new Ingresos();
?>

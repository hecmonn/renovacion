<?php
require_once 'DbObjects.php';
class Donativos extends DbObjects{
    public $did;
    public $monto;
    public $pago_completo;
    public $restante;
    public static $table="donativos";
}

$Donativo=new Donativos();
?>

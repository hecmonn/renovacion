<?php
require_once 'DbObjects.php';
class Colegiaturas extends DbObjects{
    public $aid;
    public $monto;
    public $pago_completo;
    public $restante;
    public $cuenta;
    public static $table="colegiaturas";
}

$Colegiatura=new Colegiaturas();
?>

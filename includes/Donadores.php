<?php
require_once 'DbObjects.php';
class Donadores extends DbObjects {
    public $id;
    public $nombre;
    public $tipo;
    public static $table="donadores";

}

$Donador=new Donadores();
?>

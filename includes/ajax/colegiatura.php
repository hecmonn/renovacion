<?php
require_once '../functions.php';
$aid=$_GET["aid"];
$sql="SELECT * FROM alumnos WHERE id={$aid}";
$res=exec_query($sql);
while ($row=fetch($res)) {
    $monto=$row["colegiatura"];
}
echo $monto;
?>

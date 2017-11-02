<?php
require_once '../functions.php';
$aid=$_GET["aid"];
$sql="SELECT * FROM donadores WHERE id={$aid}";
$res=exec_query($sql);
while ($row=fetch($res)) {
    $monto=$row["donativo"];
}
echo $monto;
?>

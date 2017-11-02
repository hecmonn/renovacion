<?php
require_once '../../includes/ini.php';
$sql="SELECT * FROM donadores";
$res=exec_query($sql);
$output="";
while($row=fetch($res)){
    $id=$row["id"];
    $nombre=html_prep($row["nombre"]);
    $tipo=html_prep($row["tipo"]);
    $output.="<tr><td>{$nombre}</td>";
    $output.="<td>{$tipo}</td>";
    $output.="<td><a href='#'>Editar</a></td></tr>";
}
$title="Donadores";
$subtitle="Listado de {$title}";
require_once HEADER;
?>
<div class="col-md-12 table-responsive">
    <a href="create.php" class="pull-right">Agregar donador</a><br><br>
    <table class="table table-hover">
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Opciones</th>
        </tr>
        <?php echo $output; ?>
    </table>
</div>
<?php require_once FOOTER; ?>

<?php
require_once '../../includes/ini.php';
$sql="SELECT * FROM alumnos";
$res=exec_query($sql);
$output="";
while($row=fetch($res)){
    $id=$row["id"];
    $nombre=$row["nombre"];
    $apellido=$row["apellido"];
    $ing=$row["fecha_ingreso"];
    $colegiatura=money($row["colegiatura"]);
    $output.="<tr><td>{$nombre}</td>";
    $output.="<td>{$apellido}</td>";
    $output.="<td>{$ing}</td>";
    $output.="<td>{$colegiatura}</td>";
    $output.="<td><a href='#'>Editar</a> <a href='pagos.php?aid={$id}'>Pagos</a></td></tr>";
}
$title="Alumnos";
$subtitle="Listado de {$title}";
require_once HEADER;
?>
<div class="col-md-12 table-responsive">
    <a href="create.php" class="pull-right">Agregar alumno</a><br><br>
    <table class="table table-hover">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Fecha de ingreso</th>
            <th>Colegiatura</th>
            <th>Opciones</th>
        </tr>
        <?php echo $output; ?>
    </table>
</div>
<?php require_once FOOTER; ?>

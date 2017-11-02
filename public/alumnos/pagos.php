<?php
require_once '../../includes/ini.php';
$aid=$_GET["aid"];
$sql="SELECT a.*,b.id,b.monto,b.descripcion,b.created_date,b.tipo FROM alumnos a LEFT JOIN ingresos b ON a.id=b.aid WHERE a.id={$aid}";
$res=exec_query($sql);
$output="";
while ($row=fetch($res)) {
    $nombre=html_prep(nombre($row));
    $pago=money($row["monto"]);
    $tipo=html_prep($row["tipo"]);
    $descripcion=html_prep($row["descripcion"]);
    $fecha_pago=pretty_date($row["created_date"]);
    $output.="<tr><td>{$fecha_pago}</td>";
    $output.="<td>{$descripcion}</td>";
    $output.="<td>{$tipo}</td>";
    $output.="<td>{$pago}</td></tr>";
}
$title="Pagos";
$subtitle="Ingresos de {$nombre}";
require_once HEADER;
?>
<div class="col-md-6">
    <h4>Tabla de pagos</h4>
    <div class="table table">
        <table class="table table-striped">
            <tr>
                <th>Fecha</th>
                <th>Descripción</th>
                <th>Tipo</th>
                <th>Monto</th>
            </tr>
            <?php echo $output; ?>

        </table>
    </div>

</div>
<?php require_once FOOTER; ?>
<script type="text/javascript">
    $(function(){
        $('#alumnos').attr('class','active');
    });
</script>

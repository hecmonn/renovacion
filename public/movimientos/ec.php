<?php
require_once '../../includes/ini.php';
$month=isset($_GET["mid"])?mysql_prep($_GET["mid"]):date('n',strtotime('today'));
$year=isset($_GET["yid"])?mysql_prep($_GET["mid"]):date('Y',strtotime('today'));
$sql_a="SELECT a.* FROM (SELECT created_date,monto,restante,pago_completo,b.nombre FROM colegiaturas a INNER JOIN alumnos b ON a.aid=b.id WHERE cuenta=1 AND month(created_date)={$month} AND year(created_date)={$year} UNION ALL SELECT created_date,monto,restante,pago_completo,b.nombre FROM donativos a INNER JOIN donadores b ON a.did=b.id WHERE cuenta=1 AND month(created_date)={$month} AND year(created_date)={$year}) a";
$sql_b="SELECT a.* FROM (SELECT created_date,monto,restante,pago_completo,b.nombre FROM colegiaturas a INNER JOIN alumnos b ON a.aid=b.id WHERE cuenta=2 AND month(created_date)={$month} AND year(created_date)={$year} UNION ALL SELECT created_date,monto,restante,pago_completo,b.nombre FROM donativos a INNER JOIN donadores b ON a.did=b.id WHERE cuenta=2 AND month(created_date)={$month} AND year(created_date)={$year}) a";
$sql_c="SELECT a.* FROM (SELECT created_date,monto,restante,pago_completo,b.nombre FROM colegiaturas a INNER JOIN alumnos b ON a.aid=b.id WHERE cuenta=3 AND month(created_date)={$month} AND year(created_date)={$year} UNION ALL SELECT created_date,monto,restante,pago_completo,b.nombre FROM donativos a INNER JOIN donadores b ON a.did=b.id WHERE cuenta=3 AND month(created_date)={$month} AND year(created_date)={$year}) a";
$res_a=exec_query($sql_a);
$res_b=exec_query($sql_b);
$res_c=exec_query($sql_c);
//totales cuentas
$sql_ta="SELECT sum(a.monto) as mon, sum(a.restante) as rest FROM (SELECT created_date,monto,restante,pago_completo,b.nombre FROM colegiaturas a INNER JOIN alumnos b ON a.aid=b.id WHERE cuenta=1 AND month(created_date)={$month} AND year(created_date)={$year} UNION ALL SELECT created_date,monto,restante,pago_completo,b.nombre FROM donativos a INNER JOIN donadores b ON a.did=b.id WHERE cuenta=1 AND month(created_date)={$month} AND year(created_date)={$year}) a";
$sql_tb="SELECT sum(a.monto) as mon, sum(a.restante) as rest FROM (SELECT created_date,monto,restante,pago_completo,b.nombre FROM colegiaturas a INNER JOIN alumnos b ON a.aid=b.id WHERE cuenta=2 AND month(created_date)={$month} AND year(created_date)={$year} UNION ALL SELECT created_date,monto,restante,pago_completo,b.nombre FROM donativos a INNER JOIN donadores b ON a.did=b.id WHERE cuenta=2 AND month(created_date)={$month} AND year(created_date)={$year}) a";
$sql_tc="SELECT sum(a.monto) as mon, sum(a.restante) as rest FROM (SELECT created_date,monto,restante,pago_completo,b.nombre FROM colegiaturas a INNER JOIN alumnos b ON a.aid=b.id WHERE cuenta=3 AND month(created_date)={$month} AND year(created_date)={$year} UNION ALL SELECT created_date,monto,restante,pago_completo,b.nombre FROM donativos a INNER JOIN donadores b ON a.did=b.id WHERE cuenta=3 AND month(created_date)={$month} AND year(created_date)={$year}) a";
$res_ta=exec_query($sql_ta);
$res_tb=exec_query($sql_tb);
$res_tc=exec_query($sql_tc);

//total total
$sql_tot="SELECT sum(a.mon) as mon, sum(a.restante) as rest FROM (SELECT sum(monto) as mon,sum(restante) as restante FROM colegiaturas a WHERE month(created_date)={$month} AND year(created_date)={$year} UNION ALL SELECT sum(monto) as mon,sum(restante) as restante FROM donativos a WHERE month(created_date)={$month} AND year(created_date)={$year}) a";
$res_tot=exec_query($sql_tot);
while ($row=fetch($res_tot)) {
    $tot_ing=money($row["mon"]);
    $tot_res=money($row["rest"]);
}
while ($row=fetch($res_ta)) {
    $tot_a=money($row["mon"]);
    $rest_a=money($row["rest"]);
}
while ($row=fetch($res_tb)) {
    $tot_b=money($row["mon"]);
    $rest_b=money($row["rest"]);
}
while ($row=fetch($res_tc)) {
    $tot_c=money($row["mon"]);
    $rest_c=money($row["rest"]);
}

$output_a="<table class='table table-striped'><tr><th>Fecha</th><th>Fuente</th><th>Monto</th><th>Restante</th><th>Pago completo</th></tr>";
while ($row=fetch($res_a)) {
    $fuente=html_prep($row["nombre"]);
    $date=pretty_date($row["created_date"]);
    $monto=money($row["monto"]);
    $restante=money($row["restante"]);
    $pago_completo=$row["pago_completo"]?'Sí':'No';
    $output_a.="<tr><td>{$date}</td>";
    $output_a.="<td>{$fuente}</td>";
    $output_a.="<td>{$monto}</td>";
    $output_a.="<td>{$restante}</td>";
    $output_a.="<td>{$pago_completo}</td></tr>";
}
$output_a.="</table>";
$output_b="<table class='table table-striped'><tr><th>Fecha</th><th>Fuente</th><th>Monto</th><th>Restante</th><th>Pago completo</th></tr>";
while ($row=fetch($res_b)) {
    $fuente=html_prep($row["nombre"]);
    $date=pretty_date($row["created_date"]);
    $monto=money($row["monto"]);
    $restante=money($row["restante"]);
    $pago_completo=$row["pago_completo"]?'Sí':'No';
    $output_b.="<tr><td>{$date}</td>";
    $output_b.="<td>{$fuente}</td>";
    $output_b.="<td>{$monto}</td>";
    $output_b.="<td>{$restante}</td>";
    $output_b.="<td>{$pago_completo}</td></tr>";
}
$output_b.="</table>";

$output_c="<table class='table table-striped'><tr><th>Fecha</th><th>Fuente</th><th>Monto</th><th>Restante</th><th>Pago completo</th></tr>";
while ($row=fetch($res_c)) {
    $fuente=html_prep($row["nombre"]);
    $date=pretty_date($row["created_date"]);
    $monto=money($row["monto"]);
    $restante=money($row["restante"]);
    $pago_completo=$row["pago_completo"]?'Sí':'No';
    $output_c.="<tr><td>{$date}</td>";
    $output_c.="<td>{$fuente}</td>";
    $output_c.="<td>{$monto}</td>";
    $output_c.="<td>{$restante}</td>";
    $output_c.="<td>{$pago_completo}</td></tr>";
}
$output_c.="</table>";
$pm=date('F',strtotime($month));
$title="Estado de cuenta";
$subtitle="Movimientos de {$month}-{$year}";
require_once HEADER;
?>
<div class="row">

    <div class="col-md-7">
        <form action="ec.php" method="get">
            <div class="row">
                <div class="col-md-4">
                    <label for="">Mes</label>
                    <select class="form-control" name="mid">
                        <option value="1"> Enero </option>
                        <option value="2"> Febrero </option>
                        <option value="3"> Marzo </option>
                        <option value="4"> Abril </option>
                        <option value="5"> Mayo </option>
                        <option value="6"> Junio </option>
                        <option value="7"> Julio </option>
                        <option value="8"> Agosto </option>
                        <option value="9"> Septiembre </option>
                        <option value="10"> Octubre </option>
                        <option value="11"> Noviembre </option>
                        <option value="12"> Diciembre </option>
                    </select>
                </div>
                <div class="col-md-4">
                    <label for="">Año</label>
                    <select class="form-control" name="">
                        <option value="2016">2016</option>
                        <option value="2017">2017</option>
                        <option value="2018">2018</option>
                    </select>
                </div>
                <div class="col-md-2"><br>
                    <input type="submit" name="submit" value="Ver" class="btn btn-md btn-success">

                </div>
            </div>
        </form><br>
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" id="colegiatura-holder" href="#af">A-F</a></li>
            <li><a data-toggle="tab" id="donativo-holder" href="#go">G-O</a></li>
            <li><a data-toggle="tab" id="otro-holder" href="#hz">H-Z</a></li>
        </ul><br>
        <div class="tab-content">
            <div id="af" class="tab-pane fade in active">
                <label for="">Cuenta A-F</label>
                <?php echo $output_a; ?>
                <label for="">Total ingresado</label> <?php echo $tot_a; ?><br>
                <label for="">Total restante</label> <?php echo $rest_a; ?>
            </div>
            <div id="go" class="tab-pane fade">
                <label for="">Cuenta G-O</label>
                <?php echo $output_b; ?>
                <label for="">Total ingresado</label> <?php echo $tot_b; ?><br>
                <label for="">Total restante</label> <?php echo $rest_b; ?>
            </div>
            <div id="hz" class="tab-pane fade">
                <label for="">Cuenta H-Z</label>
                <?php echo $output_c; ?>
                <label for="">Total ingresado</label> <?php echo $tot_c; ?><br>
                <label for="">Total restante</label> <?php echo $rest_c; ?>
            </div>

        </div>
</div>
    <div class="col-md-4">
        <h3>Totales</h3>
        <label for="">Total de ingresos</label>
        <?php echo $tot_ing; ?><br>
        <label for="">Total de restantes</label>
        <?php echo $tot_res; ?>
    </div>
</div>
<?php require_once FOOTER; ?>
<script type="text/javascript">
    $(function(){
        $('#movimientos').attr('class','active');
        $('#donativo-holder').click(function(){
            $('#donativo-val').removeAttr('disabled');
            $('#colegiatura-val').prop('disabled','disabled');
        });
        $('#colegiatura-holder').click(function(){
            $('#donativo-val').prop('disabled','disabled');
            $('#colegiatura-val').removeAttr('disabled');
        });
        $('#otro-holder').click(function(){
            $('#donativo-val').prop('disabled','disabled');
            $('#colegiatura-val').prop('disabled','disabled');
        });
    });
</script>

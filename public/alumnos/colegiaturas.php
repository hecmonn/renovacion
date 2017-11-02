<?php
require_once '../../includes/ini.php';
require_once '../../includes/Colegiaturas.php';
if(isset($_POST["submit"])){
  $sql="SELECT colegiatura FROM alumnos WHERE id={$_POST['aid']}";
  $res=exec_query($sql);
  $colegiatura=array_shift(fetch($res));
  $_POST["restante"]=(float)$colegiatura-(float)$_POST["monto"];
  $nueva_colegiatura=$Colegiatura->create($_POST);
  $pago=money($_POST["monto"]);
  if($nueva_colegiatura){
    $_SESSION["message"]="Colegiatura por {$pago} capturada correctamente";
    redirect_to("colegiaturas.php");
  }
}
$month=date("m",strtotime('today'));
$sql="SELECT a.* FROM alumnos a WHERE id NOT IN (SELECT aid FROM colegiaturas WHERE month(created_date)={$month})";
$res=exec_query($sql);
$output="";
while($row=fetch($res)){
    $id=$row["id"];
    $nombre=html_prep($row["nombre"]);
    $apellido=html_prep($row["apellido"]);
    $colegiatura=money($row["colegiatura"]);
    $output.="<tr><td>{$nombre}</td>";
    $output.="<td>{$apellido}</td>";
    $output.="<td>{$colegiatura}</td>";
    $output.="<td class='aid-holder'><span class='pago-trigger-completo' aid='{$id}' nombre='{$nombre}'><a data-toggle='modal' data-target='#pago-completo'>Completo</a></span> <span class='pago-trigger-parcial' aid='{$id}' nombre='{$nombre}'><a data-toggle='modal' data-target='#pago-parcial'>Parcial</a></span></td></tr>";
}
$title="Alumnos";
$subtitle="Colegiaturas de {$title}";
require_once HEADER;
?>
<div class="col-md-12 table-responsive">
    <h3>Colegiatura del mes de <?php echo date('F',strtotime('today')); ?></h3>
    <table class="table table-hover">
        <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Colegiatura</th>
            <th>Opciones</th>
        </tr>
        <?php echo $output; ?>
    </table>
</div>
<div class="modal fade" id="pago-parcial" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title pull-left" id="exampleModalLabel">Pago parcial</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="colegiaturas.php" method="post">
          <p>
              Monto a pagar para<div id="name-holder-modal-parcial"><h4></h4></div>
          </p>
          <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="number" step=".01" id="monto-form-parcial" class="form-control" name="monto">
          </div><br>
          <label for="">Cuenta</label>
          <select id="cuenta-parcial" name="cuenta" class="form-control">
            <option value="1" class="form-control">A-F</option>
            <option value="2" class="form-control">G-N</option>
            <option value="3" class="form-control">O-Z</option>
          </select><br>
          <input type="hidden" name="aid" id="aid-form-parcial">
      </div>
      <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="submit" name="submit" class="btn btn-primary" value="Aceptar">
        </form>
      </div>
    </div>
  </div>
</div>
<div class="modal fade" id="pago-completo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title pull-left" id="exampleModalLabel">Pago Completo</h3>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>
          Pagar colegiatura completa para <div id="name-holder-modal"><h4></h4></div>
        </p>
      </div>
      <div class="modal-footer">
        <form action="colegiaturas.php" method="post">
          <label for="" class="pull-left">Cuenta</label>
          <select id="cuenta-completo" name="cuenta" class="form-control">
            <option value="1" class="form-control">A-F</option>
            <option value="2" class="form-control">G-N</option>
            <option value="3" class="form-control">O-Z</option>
          </select><br><hr>
          <input type="hidden" id="monto-form-completo" name="monto">
          <input type="hidden" id="aid-form-completo" name="aid">
          <input type="hidden" id="pago-completo-form" name="pago_completo">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="submit" name="submit" class="btn btn-primary" value="Aceptar">
        </form>
      </div>
    </div>
  </div>
</div>
<?php require_once FOOTER; ?>
<script type="text/javascript">
  $(function(){
    $('.pago-trigger-completo').click(function(){
      var aid=$(this).attr('aid'),
          nombre=$(this).attr('nombre');
      $('#name-holder-modal h4').html(nombre);
      $.ajax({
        type:"GET",
        url:"/renovacion/includes/ajax/colegiatura.php",
        data:{aid:aid},
        success:
          function(res){
            $('#monto-form-completo').val(res);
            $('#aid-form-completo').val(aid);
            $('#pago-completo-form').val(1);
          }
      });
    });
    $('.pago-trigger-parcial').click(function(){
      console.log('hey');
        var aid=$(this).attr('aid'),
            nombre=$(this).attr('nombre');
            console.log(nombre);
        $('#name-holder-modal-parcial h4').html(nombre);
        $('#aid-form-parcial').val(aid);
    });
  });
</script>

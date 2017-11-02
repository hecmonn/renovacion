<?php
require_once '../../includes/ini.php';
if(isset($_POST["submit"])){
    $nuevo_alumno=$Alumnos->create($_POST);
    if($nuevo_alumno){
        $_SESSION["message"]="Alumno capturado exitósamente";
        redirect_to("index.php");
    }
}
$title="Alumnos";
$subtitle="Captura de {$title}";
require_once HEADER;
?>
<div class="col-md-6 col-md-offset-3">
    <form action="create.php" method="post">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" class="form-control" required><br>
        <label for="nombre">Apellidos</label>
        <input type="text" name="apellido" class="form-control" required><br>
        <label for="nombre">Dirección</label>
        <input type="text" name="direccion" class="form-control" required><br>
        <label for="Colegiatura">Colegiatura</label>
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input type="number" name="colegiatura" class="form-control" required>
        </div><br>
        <label for="nombre">Fecha de nacimiento</label>
        <input type="date" name="bod" class="form-control" required><br>
        <label for="nombre">Fecha de ingreso</label>
        <input type="date" name="fecha_ingreso" class="form-control" required><br>
        <input type="submit" name="submit" value="Capturar" class="btn btn-success btn-md center-block">
    </form>
</div>
<?php require_once FOOTER; ?>
<script type="text/javascript">
    $(function(){
        $('#alumnos').attr('class','active');
    });
</script>

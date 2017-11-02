<?php
require_once '../../includes/ini.php';
require_once '../../includes/Donadores.php';
if(isset($_POST["submit"])){
    $nuevo_donador=$Donador->create($_POST);
    if($nuevo_donador){
        $_SESSION["message"]="Nuevo donador {$_POST['nombre']} creado exitósamente";
        redirect_to("index.php");
    }
}
$title="Donadores";
$subtitle="Captura de {$title}";
require_once HEADER;
?>
<div class="col-md-6 col-md-offset-3">
    <form action="create.php" method="post">
        <label for="">Nombre</label>
        <input type="text" name="nombre" class="form-control" required>
        <label for="">Tipo</label>
        <select class="form-control" name="tipo" required>
            <option value="fisica">Física</option>
            <option value="moral">Moral</option>
            <option value="especia">Especia</option>
        </select><br>
        <input type="submit" name="submit" value="Capturar" class="btn btn-md btn-success center-block">
    </form>

</div>

<?php require_once FOOTER; ?>
<script type="text/javascript">
    $(function(){
        $('#movimientos').attr('class','active');
    });
</script>

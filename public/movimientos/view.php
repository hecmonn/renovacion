<?php
require_once '../../includes/ini.php';
require_once '../../includes/Ingresos.php';
if(isset($_POST["submit"])){
    if(!empty($_POST["did"])){
        $_POST["tipo"]="donativo";
        unset($_POST["aid"]);
    } elseif (!empty($_POST["aid"])) {
        $_POST["tipo"]="colegiatura";
        unset($_POST["did"]);
    } else {
        $_POST["tipo"]="otro";
        unset($_POST["did"]);
        unset($_POST["aid"]);
    }
    $nuevo_ingreso=$Ingreso->create($_POST);
    if($nuevo_ingreso){
        $_SESSION["message"]="Nuevo ingreso por ".money($_POST["monto"])." creado exitósamente";
        redirect_to("index.php");
    }
}
$title="Ingresos";
$subtitle="Captura de {$title}";
require_once HEADER;
?>
<div class="col-md-6 col-md-offset-3">
    <form action="create.php" method="post">
        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" id="colegiatura-holder" href="#colegiatura">Colegiatura</a></li>
            <li><a data-toggle="tab" id="donativo-holder" href="#donativo">Donativo</a></li>
            <li><a data-toggle="tab" id="otro-holder" href="#otro">Otro</a></li>
        </ul><br>
        <div class="tab-content">
            <div id="donativo" class="tab-pane fade">
            </div>

            <div id="colegiatura" class="tab-pane fade in active">
            </div>

            <div id="otro" class="tab-pane fade">

            </div>

        </div><br>

    </form>
</div>

<?php require_once FOOTER; ?>
<script type="text/javascript">
</script>

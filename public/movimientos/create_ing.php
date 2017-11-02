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
        $_SESSION["message"]="Nuevo egreso por ".money($_POST["monto"])." creado exitósamente";
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
                <label for="">Nombre del donador</label>
                <select id="donativo-val" class="form-control" name="did">
                    <option value="" selected>Seleccionar donador</option>
                    <?php
                        $sql="SELECT * FROM donadores";
                        $res=exec_query($sql);
                        while ($row=fetch($res)) {
                            $id=$row["id"];
                            $nombre=html_prep($row["nombre"]);
                            echo "<option value='{$id}'>{$nombre}</option>";
                        }
                    ?>
                </select>
            </div>
            <div id="colegiatura" class="tab-pane fade in active">
                <label for="">Nombre de alumno</label>
                <select id="colegiatura-val" class="form-control" name="aid">
                    <option value="" selected>Seleccionar alumno</option>
                    <?php
                        $sql="SELECT * FROM alumnos";
                        $res=exec_query($sql);
                        while ($row=fetch($res)) {
                            $id=$row["id"];
                            $nombre=nombre($row);
                            echo "<option value='{$id}'>{$nombre}</option>";
                        }
                    ?>
                </select>
            </div>
            <div id="otro" class="tab-pane fade">
                <select id="colegiatura-val" class="form-control" name="aid">
                    <option value="" selected>Seleccionar alumno</option>
                    <?php
                        $sql="SELECT * FROM alumnos";
                        $res=exec_query($sql);
                        while ($row=fetch($res)) {
                            $id=$row["id"];
                            $nombre=nombre($row);
                            echo "<option value='{$id}'>{$nombre}</option>";
                        }
                    ?>
                </select>
            </div>

        </div><br>
        <label for="">Descripción</label>
        <input type="text" name="descripcion" class="form-control" max="70" required><br>
        <label for="">Monto</label>
        <div class="input-group">
            <div class="input-group-addon">$</div>
            <input type="number" name="monto" class="form-control" step=".01" required>
        </div>
        <label for=""></label>
        <input type="submit" name="submit" value="Capturar" class="btn btn-md btn-success center-block">
    </form>
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

<?php
require_once '../../includes/ini.php';
if(isset($_POST["submit"])){
    $nuevo_donador=$Donador->create($_POST);
    if($nuevo_donador){
        $_SESSION["message"]="Nuevo donador {$_POST['nombre']} creado exitósamente";
        redirect_to("index.php");
    }
}
$title="Estudio Socioeconomico de Inscripción";
$subtitle="Captura de {$title}";
require_once HEADER;
?>

<div class="col-md-11 col-md-offset-1">
        <form action="inscripcion.php" method="post">
            <div class="row">
                <h2>Datos del beneficiario</h2>
                <div class="col-md-5">
                    <label for="cuota">Nombre</label>
                    <input type="text" name="nombre" class="form-control" />
                    <label for="cuota">Apellido paterno</label>
                    <input type="text" name="apellido_paterno" class="form-control" />
                    <label for="cuota">Apellido materno</label>
                    <input type="text" name="apellido_materno" class="form-control" />
                    <label for="cuota">Fecha de nacimiento</label>
                    <input type="date" name="dob" class="form-control" />
                    <label for="cuota">Curp</label>
                    <input type="text" name="curp" class="form-control" />
                </div>
                <div class="col-md-5">
                    <label for="">Domicilio</label>
                    <input type="text" name="domicilio" class="form-control">

                    <label for="">CP</label>
                    <input type="text" name="cp" class="form-control">

                    <label for="">Sexo</label>
                    <input type="radio" name="sexo" value="Masulino" class="form-control">Masculino</input>
                    <input type="radio" name="sexo" value="Femenino" class="form-control">Femenino</input>
                </div>

            </div>
            <div class="row">
                <h2>Tutor</h2>
                <div class="col-md-5">
                    <label for="cuota">Nombre</label>
                    <input type="text" name="nombre" class="form-control" />
                    <label for="cuota">Apellido paterno</label>
                    <input type="text" name="apellido_paterno" class="form-control" />
                    <label for="cuota">Apellido materno</label>
                    <input type="text" name="apellido_materno" class="form-control" />
                    <label for="cuota">Fecha de nacimiento</label>
                    <input type="date" name="dob" class="form-control" />
                    <label for="l_n">Lugar de nacimiento</label>
                    <input type="text" name="lugar_nacimiento" class="form-control" />

                    <label for="cuota">Estado civil</label>
                    <select class="form-control" name="estado_civil">
                        <option value="soltero" class="form-control">Soltero</option>
                        <option value="casado" class="form-control">Casado</option>
                        <option value="divorciado" class="form-control">Divorciado</option>
                        <option value="viudo" class="form-control">Viudo</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <label for="cuota">Lugar de trabajo</label>
                    <input type="date" name="lugar_trabajo" class="form-control" />
                    <label for="cuota">Horario</label>
                    <select class="form-control" name="horario">
                        <option value="matutino" class="form-control">Matutino</option>
                        <option value="vespertino" class="form-control">Vespertino</option>
                        <option value="nocturno" class="form-control">Nocturno</option>
                    </select>
                    <label for="cuota">Domicilio laboral</label>
                    <input type="text" name="domicilio_laboral" class="form-control" />
                    <label for="cuota">CP</label>
                    <input type="text" name="text" class="form-control" />
                    <label for="cuota">Teléfono</label>
                    <input type="phone" name="telefono" class="form-control" />
                </div>

            </div>
        </form>

</div>

<?php require_once FOOTER; ?>

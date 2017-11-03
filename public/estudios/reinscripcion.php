<?php
require_once '../../includes/ini.php';
if(isset($_POST["submit"])){
    $nuevo_donador=$Donador->create($_POST);
    if($nuevo_donador){
        $_SESSION["message"]="Nuevo donador {$_POST['nombre']} creado exitósamente";
        redirect_to("index.php");
    }
}
$title="Estudio Socioeconomico de Reinscripción";
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

                    <label for="">Sexo</label><br>
                    <input type="radio" name="sexo" value="Masulino">Masculino</input><br>
                    <input type="radio" name="sexo" value="Femenino">Femenino</input>
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
            <div class="row">
                <h2>¿Quién recoge al niño?</h2>
                <div class="col-md-5">
                    <label for="cuota">Nombre</label>
                    <input type="text" name="nombre_recoge" class="form-control" />

                    <label for="cuota">Domicilio</label>
                    <input type="text" name="domicilio_recoge" class="form-control" />
                </div>
                <div class="col-md-5">
                    <label for="cuota">Telefono</label>
                    <input type="text" name="telefono_recoge" class="form-control" />

                    <label for="cuota">Parentesco</label>
                    <input type="text" name="parentesco" class="form-control" />
                </div>
            </div><hr>
            <div class="row">
                <div class="col-md-5">
                    <label for="">En caso de encontrarse fuera del núcleo familiar el padre o la madre desde cuándo</label>
                </div>
                <div class="col-md-5">
                    <input type="text" name="fuera_nucleo" class="form-control">
                </div>
            </div><hr>
            <div class="table-responsive">
                <h2>Estructura Familiar</h2>
                <table class="form_ent table table-bordered" id="dynamic_field">
                    <tr>
                        <th>Nombre</th>
                        <th>Edad</th>
                        <th>Sexo</th>
                        <th>Parentesco</th>
                        <th>Ocupación</th>
                        <th>Escolaridad</th>
                    </tr>
                    <tr>
                        <td><input type="text" name="familia_persona_nombre[]" placeholder="Nombre" class="form-control" required /></td>
                        <td><input type="text" name="familia_persona_edad[]" placeholder="Edad" class="form-control" /></td>
                        <td><input type="radio" name="familia_persona_sexo[]" value="M">M</input><br><input type="radio" name="familia_persona_sexo[]" value="F">F</input></td>
                        <td><input type="text" name="familia_persona_parentesco[]" placeholder="Parentesco" class="form-control" required/></td>
                        <td><input type="text" name="familia_persona_ocupacion[]" placeholder="Ocupacion" class="form-control" required/></td>
                        <td><input type="text" name="familia_persona_escolaridad[]" placeholder="Escolaridad" class="form-control" required/></td>
                        <td><button type="button" name="add" id="add" class="btn btn-success">+</button></td>
                    </tr>
                </table>
            </div>
            <div class="row">
                <h2>Salud</h2>
                <h4>Metodo de planificacion familiar utilizado</h4>
                <div class="col-md-5">
                    <input type="checkbox" name="metodo_planificacion" value="pastillas">Pastillas</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="inyecciones">Inyecciones</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="perservativos">Perservativos</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="Apoyo">Apoyo</input>
                </div>
                <div class="col-md-5">
                    <input type="checkbox" name="metodo_planificacion" value="Dispositivo Intrauterino">Dispositivo Intrauterino</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="Salpingoclasia">Salpingoclasia</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="ritmo" >Ritmo</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="vasectomia">Vasectomia</input>
                </div>
            </div>
            <div class="row">
                <h4>Servicio médico al que asiste la familia</h4>
                <div class="col-md-5">
                    <input type="checkbox" name="metodo_planificacion" value="IMSS">IMSS</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="Homeópata">Homeópata</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="ISSTE">ISSTE</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="Servicio salud">Servicio salud</input>
                </div>
                <div class="col-md-5">
                    <input type="checkbox" name="metodo_planificacion" value="Particular">Particular</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="Centro de salud">Centro de salud</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="Autoreceta" >Autoreceta</input><br>
                    <input type="checkbox" name="metodo_planificacion" value="Dispensario">Dispensario</input>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <h4>Zona</h4>
                    <select class="form-control" name="zona">
                        <option value="Urbana" class="form-control">Urbana</option>
                        <option value="Suburbana" class="form-control">Suburbana</option>
                        <option value="Residencial" class="form-control">Residencial</option>
                        <option value="rural" class="form-control">Rural</option>
                    </select>
                </div>
                <div class="col-md-5">
                    <h4>Tipo de vivienda</h4>
                    <select class="form-control" name="zona">
                        <option value="Casa Sola" class="form-control">Casa Sola</option>
                        <option value="Departamento" class="form-control">Departamento</option>
                        <option value="Vecindad" class="form-control">Vecindad</option>
                        <option value="Cuarto de servicio" class="form-control">Cuarto de servicio</option>
                        <option value="Cuarto terreno" class="form-control">Cuarto terreno</option>
                    </select>
                </div>
            </div>
        </form>
</div>

<?php require_once FOOTER; ?>
<script src="../js/dynamic_rows.js"></script>

<?php
require_once '../../includes/ini.php';
if (isset($_POST["submit"])) {
    $password=$_POST["unhashed_password"];
    $_POST["password"]=password_hash($password,PASSWORD_DEFAULT);
    $_POST["type"]=1;
    //die(var_dump($_POST));
    $nuevo_usuario=$Usuario->create($_POST);
    if($nuevo_usuario){
        $_SESSION["message"]="Usuario creado exitosamente";
        redirect_to("index.php");
    }
}
require_once HEADER;
?>
<div class="col-md-4 col-md-offset-4">
    <form action="create.php" method="post">
        <label for="">Nombre de usuario</label>
        <input type="text" id="username" name="usuario" class="form-control" required><br>
        <div id="username-holder" class="alert alert-danger col-md-12" style="display:none;">
            <p>Este usuario ya existe, elegir otro</p>
        </div>
        <label for="pass">Contraseña</label>
        <input type="password" name="unhashed_password" id="pass" class="form-control" required><br>
        <input type="password" name="confirm" id="pass-conf" class="form-control" required>
        <p class="text-muted">Confirmar contraseña</p>
        <div id="pass-conf-holder" class="alert alert-danger col-md-12" style="display:none;">
            <p class="danger">Contraseñas no coinciden</p>
        </div>
        <input type="submit" id="submit-user" name="submit" class="btn btn-md btn-success center-block" value="Crear">
    </form>
</div>
<?php require_once FOOTER; ?>
<script type="text/javascript">
$(function(){
    $(function(){
        $('#usuarios').attr('class','active');
    });
    $('#pass-conf').keyup(function(){
        var pass=$('#pass').val();
        var passConf=$('#pass-conf').val();
        if(pass!==passConf){
            $('#pass-conf-holder').show();
            $('#submit-user').attr('disabled',true);
        } else{
            $('#submit-user').attr('disabled',false);
            $('#pass-conf-holder').hide();
        }
    });
    $('#username').keyup(function(){
        var username=$('#username').val();
        $.ajax({
            type:"GET",
            url:"/renovacion/includes/ajax/find_user.php",
            async: false,
            data: {username:username},
            success:
                function(res){
                    if(res=="false"){
                        console.log('false');
                        $('#submit-user').attr('disabled',false);
                        $('#username-holder').hide();
                    } else if(res=="true") {
                        console.log('true');
                        $('#submit-user').attr('disabled',true);
                        $('#username-holder').show();
                    }
                }
        });
    });
});
</script>

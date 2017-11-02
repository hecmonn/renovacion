<?php
require_once '../includes/ini.php';
if (isset($_POST["submit"])) {
    $user=mysql_prep($_POST["user"]);
    $pass=mysql_prep($_POST["pass"]);
    $found_user=find_username($user);
    if($found_user){
        $password_check=password_check($pass,$found_user["password"]);
        if($password_check){
            $_SESSION["logged"]=true;
            $_SESSION["username"]=$found_user["usuario"];
            $_SESSION["type"]=$found_user["type"];
            redirect_to("index.php");
        }
    } else{

    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Renovación</title>
        <link rel="stylesheet" href="/renovacion/public/css/bootstrap.min.css" media="screen" title="no title">
    </head>
    <body>
        <div class="container">
            <div class="col-md-6 col-md-offset-3">
                <h1 class="text-center">Renovacion AC</h1>
                <p class="text-center">Sistema de control</p><hr>
                <form action="login.php" method="post">
                    <label for="usuario">Usuario</label>
                    <input type="text" name="user" class="form-control">
                    <label for="pass">Contraseña</label>
                    <input type="password" name="pass" class="form-control"><br>
                    <input type="submit" name="submit" class="btn btn-md btn-success center-block" value="Ingresar">
                </form>
            </div>
        </div>
    </body>
</html>

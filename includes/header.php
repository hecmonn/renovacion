<?php
if(isset($_SESSION["logged"])){
    redirect_to("/renovacion/public/login.php");
}
require_once 'ini.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Renovacion AC<?php if(isset($title)) echo " | {$title}"; ?></title>
        <link rel="stylesheet" href="/renovacion/public/css/bootstrap.min.css" media="screen" title="no title">
        <style media="screen">
            a{
                cursor:pointer;
            }
        </style>
    </head>
    <body>
        <nav class="navbar navbar-default navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Renovacion AC</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li id="inicio"><a  href="/renovacion/public/index.php">Inicio</a></li>
                <li id="alumnos"><a  href="/renovacion/public/alumnos/index.php">Alumnos</a></li>
                <li id="usuarios"><a  href="/renovacion/public/usuarios/index.php">Usuarios</a></li>
                <li id="donadores"><a  href="/renovacion/public/donadores/index.php">Donadores</a></li>
                <li id="movimientos"><a  href="/renovacion/public/movimientos/index.php">Movimientos</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Opciones <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                      <li><a href="/renovacion/includes/logout.php">Cerrar sesión</a></li>
                    </ul>
                  </li>
              </ul>
            </div>
          </div>
        </nav>
        <div class="container">
            <div class="header-title">
                <p class="text-center"><?php echo session_message(); ?></p>
                <h2 class="text-center"><?php if(isset($subtitle)) echo $subtitle."<hr>"; ?></h2>
            </div>

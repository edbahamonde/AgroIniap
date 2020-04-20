<?php
session_start();
error_reporting(0); // No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Usted no tiene autorizacion';
die();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AgroIniap</title>
  <link rel="icon" href="../Libs/MDBootstrap/img/mdb-favicon.ico" type="image/x-icon">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/style.css">

</head>

<body>
  <nav class="navbar navbar-dark indigo">
    <span class="navbar-text white-text"> AgroIniap </span>
    <div class="btn-group">
    <button class="btn btn-outline-white btn-sm dropdown-toggle" type="button" data-toggle="dropdown"
    aria-haspopup="true" aria-expanded="false">
    Opciones
  </button>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="#">Perfil</a>
        <a class="dropdown-item" href="#">Notificaciones</a>
        <a class="dropdown-item" href="#">Acerca de ..</a>
        <div class="dropdown-divider"></div>
        <a class="dropdown-item" href="../Procesos/cerrar.php">Cerrar Sesion</a>
      </div>
    </div>

  </nav>



  <script type="text/javascript" src="../Libs/MDBootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/popper.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/mdb.min.js"></script>
  <script type="text/javascript"></script>

</body>

</html>
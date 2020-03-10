<?php
require_once "conexion.php";
require_once "BaseDatos.php";
require_once "vertipousuario.php";


?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Ver Productos</title>
</head>
<body>
    <h1>LISTA DE PRODUCTOS</h1>
    <?php cargar(); ?>
    <div><br><a href = "insertar.php">Regresar</a></div> 

</body>
</html>

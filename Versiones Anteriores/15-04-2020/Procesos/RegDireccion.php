<?php
session_start();
include_once '../Conexion/conexion2.php';
$conexion=conexion();

$provincia = $_POST['provincia'];
$canton = $_POST['canton'];
$parroquia = $_POST['parroquia'];
$Ddireccion = $_POST['Ddireccion'];


if ($provincia == null && $canton == null && $parroquia == null && $Ddireccion == null ){
    echo '<div class="alert alert-danger" role="alert">
    <strong>Por favor complete todos los campos!</strong></div>';
}else{

    $sql=" update Agr_usuario set id_provincia ='$provincia', id_canton ='$canton', id_parroquia= '$parroquia', Direccion = '$Ddireccion'  
      where CI= (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1)";
    $result=pg_query($conexion,$sql);

    echo ' <script> location.href="../Registro/Credenciales.php";</script>';
}


?>
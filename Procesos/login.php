<?php
session_start();
include_once '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_POST['cedula'];
$clave = md5($_POST['clave']);

$sql="select * from Agr_usuario where id_tipo_usuario = 1 and ci = '$usuario' and clave = '$clave'";
$result=pg_query($conexion,$sql);
$totalusuarios = pg_num_rows($result);
if($totalusuarios == 1){
    $_SESSION['usuario'] = $usuario;
    echo '<script> location.href="../Inicio/index.php"; </script>';
}else{
    $sql="select * from Agr_usuario where id_tipo_usuario = 1 and ci = '$usuario'";
    $result=pg_query($conexion,$sql);
    $totalusuarios = pg_num_rows($result);
    if($totalusuarios == 1){
    echo 'Tu clave no es la correcta';}

};
?>
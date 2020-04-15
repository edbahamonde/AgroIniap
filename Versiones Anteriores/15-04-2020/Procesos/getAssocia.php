<?php
/*include '../Conexion/conexion2.php';
$conexion=conexion();*/

$id = $_POST['id'];

if($id === "si"){
echo '<div class="alert alert-info" role="alert">
  <strong>Importante!</strong> Profavor especifique la asociación!</div>';
}else{
    echo '<div class="alert alert-info" role="alert">
    <strong>Omita!</strong> este recuadro!</div>';  
}
?>
<?php
include '../Conexion/conexion2.php';
$conexion=conexion();

$id = $_POST['id_canton'];

$sql="SELECT Id_Parroquia, nombre FROM Agr_Parroquia where Id_Canton ='$id' ORDER BY nombre";
$result=pg_query($conexion,$sql);
    echo '<option value="0">Seleccionar una Parroquia</option>';
while($fila=pg_fetch_array($result)){
    echo '<option value="'.$fila['id_parroquia'].'">'.$fila['nombre'].'</option>';}


?>
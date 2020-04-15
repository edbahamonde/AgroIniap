<?php
include '../Conexion/conexion2.php';
$conexion=conexion();

$id = $_POST['id_provincia'];

$sql="SELECT Id_Canton,nombre FROM Agr_Canton where Id_Provincia ='$id' ORDER BY nombre";
$result=pg_query($conexion,$sql);
    echo '<option value="0">Seleccionar un Canton</option>';
while($fila=pg_fetch_array($result)){
    echo '<option value="'.$fila['id_canton'].'">'.$fila['nombre'].'</option>';}


?>
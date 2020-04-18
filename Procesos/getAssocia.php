<?php
/*include '../Conexion/conexion2.php';
$conexion=conexion();*/

$id = $_POST['id'];

if($id === "si"){
echo '<label for="Easociacion">
Espesifique la asociación:
</label>
<textarea class="form-control" name="Easociacion" rows="3" require></textarea>';
};
?>
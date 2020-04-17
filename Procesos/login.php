<?php
session_start();
include_once '../Conexion/conexion2.php';
$conexion=conexion();

$usuario = $_POST['cedula'];
$clave = $_POST['clave'];
$claveC = md5($clave);

$sql="select * from Agr_usuario where id_tipo_usuario = 1 and ci = '$usuario'";
$result=pg_query($conexion,$sql);
$totalusuarios = pg_num_rows($result);

if($totalusuarios == 1){

$sql="select * from Agr_usuario where id_tipo_usuario = 1 and ci = '$usuario' and clave = '$claveC'";
$result=pg_query($conexion,$sql);
$totalusuarios = pg_num_rows($result);
if($totalusuarios == 1){
    $_SESSION['usuario'] = $usuario;
    echo '<script> location.href="../Inicio/index.php"; </script>';
}else{

    $sql="select * from Agr_usuario where id_tipo_usuario = 1 and ci = '$usuario' and clave = '$clave'";
    $result=pg_query($conexion,$sql);
    $totalusuarios = pg_num_rows($result);

    if($totalusuarios == 1){
        $_SESSION['usuario'] = $usuario;
        echo '<script> location.href="../Inicio/index.php"; </script>';
    }else{
        
    echo '<div class="alert alert-danger" role="alert">
     Tu clave no es la correcta!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
    </div>';}

}
}else{
echo '<div class="alert alert-danger" role="alert">
Usted no se encuentra resgistrado!
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
  <span aria-hidden="true">&times;</span>
</button>
</div>';
};
?>
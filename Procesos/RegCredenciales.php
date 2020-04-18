<?php
session_start();
//error_reporting(0);  No mostrar los errores 
$varsesion = $_SESSION['usuario'];

if($varsesion == null || $varsesion = ''){
echo 'Usted no tiene autorizacion';
die();
}else {
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <link rel="icon" href="../Libs/Imagenes/iniap.png" type="image/x-icon"> <!-- Icono de la pagina web -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/mdb.min.css">
  <link rel="stylesheet" href="../Libs/MDBootstrap/css/style.css">
</head>
<body>
<?php include '../Componentes/navbar.php'; ?><br>
<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">

            <?php
            
            include_once '../Conexion/conexion2.php';
              $conexion=conexion();

      if(isset($_POST['Easociacion'])){   

         $asociacion = $_POST['asociacion'];
         $Easociacion = $_POST['Easociacion'];
         $usuario = $_SESSION['usuario'];

       $sql2="SELECT correo, ci FROM Agr_usuario WHERE ci = '$usuario'";
       $last=pg_query($conexion,$sql2);
       $fila=pg_fetch_array($last);

       $correo = $fila['correo'];
       $cedula = $fila['ci'];
       $clave = md5($cedula.'Iniap');

       $sql=" UPDATE Agr_usuario SET clave = '$clave', asociacion ='$asociacion', e_asociacion ='$Easociacion', id_estado = (select Id_Estado from Agr_Estado where nombre_corto = 'A'), 
        id_tipo_usuario = (select id_tipo_usuario from Agr_Tipo_Usuario where nombre = 'U') WHERE ci= '$usuario'";
       $result=pg_query($conexion,$sql);

        echo '
         <div class="jumbotron">
          <h4>
             Exelente, has completado tu registro!
          </h4>
          <p><h5>
          <div class="form-group">
                 <strong> Ya casi estamos listos para empesar!!</strong><br>
                  Se ha enviado un mail de confirmacion a tu direccion de corréo electronico <br><br>
                  

                  <strong>'.$correo.'</strong><br><br>
                  
                  Por favor confirma tu registro!!
             <h5>
          </p>
          </div>
          <a href="EnviarMail.php" type="button" class="btn btn-primary">
                   Aceptar
                </a>
       </div>';
       }else{

      $asociacion = $_POST['asociacion'];
      $Easociacion = null;
      $usuario = $_SESSION['usuario'];
         
       $sql2="SELECT correo, ci FROM Agr_usuario WHERE ci = '$usuario'";
       $last=pg_query($conexion,$sql2);
       $fila=pg_fetch_array($last);

       $correo = $fila['correo'];
       $cedula = $fila['ci'];
       $clave = md5($cedula.'Iniap');

       $sql=" UPDATE Agr_usuario SET clave = '$clave', asociacion ='$asociacion', e_asociacion ='$Easociacion', id_estado = (select Id_Estado from Agr_Estado where nombre_corto = 'A'), 
        id_tipo_usuario = (select id_tipo_usuario from Agr_Tipo_Usuario where nombre = 'U') WHERE ci='$usuario'";
       $result=pg_query($conexion,$sql);

        echo '
        <div class="jumbotron">
        <form action="EnviarMail.php" method="POST">
         <h4>
            Exelente, has completado tu registro!
         </h4>
         <p><h5>
         <div class="form-group">
                <strong> Ya casi estamos listos para empesar!!</strong><br>
                 Se ha enviado un mail de confirmacion a tu direccion de corréo electronico <br> 
                 <strong>
                 <input type="text" class="form-control" name="correo" value="'.$correo.'" readonly/>
                 </strong><br>
                 <strong>Por favor confirma tu registro!!</strong>
            <h5>
         </p>
         </div>
         <button type="submit" class="btn btn-primary">
                  Aceptar
               </button>
         </form>
      </div>';
         };
         
             ?>
                </div>
                <div class="col-md-4">
                </div>
            </div>
</div>
</body>
</html>
      <?php };?>
<!doctype html>
<html class="no-js">
<head>
	<title>Registro de Usuario</title>
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
	<link rel="stylesheet" href="css/strength.css">
	<script src="js/password_strength.js"></script>
    <script src="js/jquery-strength.js"></script>
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<body>
<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">

            <?php
            session_start();
            include_once '../Conexion/conexion2.php';
              $conexion=conexion();

              $asociacion = $_POST['asociacion'];
              $Easociacion = $_POST['Easociacion'];
              $clave = md5($_POST['clave']);

         $sql2="SELECT correo FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1";
         $last=pg_query($conexion,$sql2);

         $sql=" update Agr_usuario set asociacion ='$asociacion', e_asociacion ='$Easociacion', clave= '$clave', id_estado = (select Id_Estado from Agr_Estado where nombre_corto = 'R'), 
          id_tipo_usuario = (select id_tipo_usuario from Agr_Tipo_Usuario where nombre = 'U') where CI= (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1)";
         $result=pg_query($conexion,$sql);

         while($fila=pg_fetch_array($last)){
          echo '
          <br><br>
           <div class="jumbotron">
           <form action="EnviarMail.php" method="POST">
				<h4>
					Exelente, has completado tu registro!
				</h4>
            <p><h5>
            <div class="form-group">

                    Ya casi estamos listos para empesar!!<br>
                    Se ha enviado un mail de confirmacion a tu direccion de corréo electronico <br> 
                    <strong>
                    <input type="text" class="form-control" name="correo" value="'.$fila['correo'].'" readonly/>
                    </strong>.<br><br>
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
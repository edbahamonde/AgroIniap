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
 


       $sql=" update Agr_usuario set asociacion ='$asociacion', e_asociacion ='$Easociacion', clave= '$clave', id_estado = (select Id_Estado from Agr_Estado where nombre_corto = 'R'), 
          id_tipo_usuario = (select id_tipo_usuario from Agr_Tipo_Usuario where nombre = 'U') where CI= (SELECT CI FROM Agr_usuario ORDER BY Fecha DESC LIMIT 1)";
         $result=pg_query($conexion,$sql);

          echo '
          <br><br>
           <div class="jumbotron">
				<h4>
					Exelente, has completado tu registro!
				</h4>
				<p><h5>
                    Ya casi estamos listos para empesar!!<br>
                    Se ha enviado un mail de confirmacion a tu direccion de corréo electronico.<br><br>
                    <strong>Por favor confirma tu registro!!</strong><h5>
				</p>
				<p>
					<a class="btn btn-primary btn-large">Ok</a>
				</p>
			</div>
          ';
             ?>
                </div>
                <div class="col-md-4">
                </div>
            </div>
</div>
</body>
</html>
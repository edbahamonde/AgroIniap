<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
<nav class="navbar navbar-dark indigo">
        <span class="navbar-text white-text">
            AgroIniap
          </span>
        <form class="form-inline my-2 my-lg-0 ml-auto">
            <a href="../Registro/Cedula.php" class="btn btn-outline-white btn-sm my-2 my-sm-0 ml-3" type="submit">Registro</a>
            <a href="../index.html" class="btn btn-outline-white btn-sm my-2 my-sm-0 ml-3" type="submit">Inicio</a>
        </form>
    </nav>
  <br>  
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<form role="form">
						<div class="form-group">
							<label for="cedula">
								Cedula de Identidad:
							</label>
							<input type="number" class="form-control" id="cedula" />
                        </div>
                        <div class="form-group">
							<label for="clave">
								Clave:
							</label>
							<input type="password" class="form-control" id="clave" />
						</div>
						<button type="button" id="enviar" class="btn btn-primary">
							Entrar
            </button>
          </form>
          <div align="right"><a href="../RecuperarClv/RecuperarCl.php">Has olvidado tus credenciales?</a></div>
          <div class="modal-footer display-footer" id="respuesta"></div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$('#enviar').click(function () {

  var Cedula = document.getElementById('cedula').value;
  var Clave = document.getElementById('clave').value;

  var ruta = "cedula=" + Cedula +"&clave="+Clave;

  $.ajax({
    url: '../Procesos/login.php',
    type: 'POST',
    data: ruta,
  })
    .done(function (res) {
      $('#respuesta').html(res)
    })
    .fail(function () {
      console.log("error");
    })
    .always(function () {
      console.log("complete");
    });
});

</script>
</div>
<script type="text/javascript" src="Libs/MDBootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="../Libs/MDBootstrap/js/popper.min.js"></script>
    <script type="text/javascript" src="../Libs/MDBootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../Libs/MDBootstrap/js/mdb.min.js"></script>
    <script type="text/javascript"></script>
</body>
</html>
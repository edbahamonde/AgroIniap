<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registro de Usuario</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">

</head>
<body><br>
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
						<button type="button" id="enviar" class="btn btn-primary">
							Continuar
						</button>
          </form><br>
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

  var ruta = "cedula=" + Cedula;

  $.ajax({
    url: '../Procesos/CedulaVI.php',
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
</body>
</html>
<?php include '../Conexion/conexion2.php';
$conexion=conexion();?>
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
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="row">
				<div class="col-md-4">
				</div>
				<div class="col-md-4">
					<form role="form" action="../Procesos/RegDireccion.php" method="POST">
                        <div class="form-group">
							<label for="provincia">
								Provincia:
                            </label>&nbsp;
                            <select id="provincia" name="provincia" require>
                                <option value="0">Seleccionar una Provincia</option>
                            <?php 
                             $sql="SELECT Id_Provincia,nombre FROM Agr_Provincia ORDER BY nombre";
                             $result=pg_query($conexion,$sql);
                                while($fila=pg_fetch_array($result)){
                                    echo '
                                    <option value="'.$fila['id_provincia'].'">'.$fila['nombre'].'</option>
                                    ';}
                            ?>
                            </select>
                            </div>
                            <div class="form-group">
                            <label for="canton">
								Canton:
                            </label>&nbsp;&nbsp;&nbsp;&nbsp;
                            <select id="canton" name="canton" require></select>
                            </div>
                            <div class="form-group">
                            <label for="parroquia">
								Parroquia:
                            </label> 
                            <select id="parroquia" name="parroquia" require></select>
                        </div>
                        <div class="form-group">
							<label for="Ddomicilio">
								Dirección Domiciliaria:
							</label>
                            <textarea class="form-control" name="Ddireccion" rows="3" require></textarea>
                        </div>
						<button type="submit"  class="btn btn-primary">
							Continuar
						</button>
                    </form>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	</div>
</div>
<script>
$(document).ready(function(){
$("#provincia").change(function(){

    $("#provincia option:selected").each(function(){
        id_provincia = $(this).val();
        $.post("../Procesos/getProvincia.php", {id_provincia: id_provincia
        }, function(data){
            $("#canton").html(data);
        });
    });
})
});

$(document).ready(function(){
$("#canton").change(function(){

    $("#canton option:selected").each(function(){
        id_canton = $(this).val();
        $.post("../Procesos/getCanton.php", {id_canton: id_canton
        }, function(data){
            $("#parroquia").html(data);
        });
    });
})
});
</script>
</div>
<script type="text/javascript" src="../Libs/MDBootstrap/js/jquery.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/popper.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="../Libs/MDBootstrap/js/mdb.min.js"></script>
  <script type="text/javascript"></script>
</body>
</html>
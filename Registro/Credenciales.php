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
					<form action="../Procesos/RegCredenciales.php" method="post" role="form">
                    <div> <ins class="adsbygoogle"
                         style="display:inline-block;width:728px;height:90px"
                            data-ad-client="ca-pub-4331617637495482"
                                data-ad-slot="2764029251"></ins></div>
                           <script> (adsbygoogle = window.adsbygoogle || []).push({});</script>
                           <div class="form-group">
                            <label for="asociacion">
								Pertenece a una asociación? :
                            </label>&nbsp;&nbsp;
                            <select id="asociacion" name="asociacion" require>
                            <option value="no">Escoja una respuesta</option>
                            <option value="no">No</option>
                            <option value="si">Si</option></select>
                            </div>
                            <div class="form-group">
                            <label for="Easociacion">
                             Espesifique la asociación:
                            </label>&nbsp;&nbsp;
                            <div id="Easociacion"></div>
                            <textarea class="form-control" name="Easociacion" rows="3" require></textarea>
                            </div>
                           <div class="form-group">
							<label for="clave">
								Contraseña:
							</label>
							<input type="password" class="check-seguridad form-control" name="clave"/>
                        </div>
						<button type="submit" class="btn btn-primary">
							Finalizar Registro
						</button>
                    </form><br>
                    <div class="modal-footer display-footer" id="respuesta"></div>
				</div>
				<div class="col-md-4">
				</div>
			</div>
		</div>
	<script>
		jQuery(function($) {
			
			$(".check-seguridad").strength({
				templates: {
    			toggle: '<span class="input-group-addon"><span class="glyphicon glyphicon-eye-open {toggleClass}"></span></span>'
                
                },
                scoreLables: {
                        empty: 'Vacío',
                        invalid: 'Invalido',
                        weak: 'Débil',
                        good: 'Bueno',
                        strong: 'Fuerte'
                    }, 
                scoreClasses: {
                        empty: '',
                        invalid: 'label-danger',
                        weak: 'label-warning',
                        good: 'label-info',
                        strong: 'label-success'
                    },

			});
		});
    </script>
    <script>
$(document).ready(function(){
$("#asociacion").change(function(){

    $("#asociacion option:selected").each(function(){
        id = $(this).val();
        $.post("../Procesos/getAssocia.php", {id: id
        }, function(data){
            $("#Easociacion").html(data);
        });
    });
})
});

</script>
    
</body>
</html>

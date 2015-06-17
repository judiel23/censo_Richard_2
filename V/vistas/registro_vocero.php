<?php
require("../../C/session.php");
require("../CSS/css.php");
 require ("menu.php");
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de Vocero</title>
	<style>#form{
		margin-top: 25px;


		}
		input[type="text"],input[type="password"],input[type="mail"]{ width:350px;   /*decoracion dentro del formulario*/
                    height:35px;
	border-radius:3px;
}
#c{
	height:110px;
	z-index: 10;
}
		</style>
</head>
<body>
	<div class="container-fluid">



		<div class="row">

<div class="col-xs-4"></div>
	<div class="col-xs-6">

<form class="form-group" id="form" action="../../c/con_registrar_vocero.php" method="POST">
<input type="hidden" name="usua" value="<?php echo $_SESSION['usu_cedula']; ?>">
				<div class="form-group">
					Cédula:<input type="text" class="form-control" id ='cedula' placeholder="Ingresa tu Cédula" name="cedula" required autofocus>
					<div id="usu"></div>
				</div>

				<div class="form-group">
					Nombre:<input type="text" class="form-control" placeholder="Ingresa tu Nombre " name="nombre" required autofocus>
				</div>

				<div class="form-group">
					Apellido:<input type="text" class="form-control" placeholder="Ingresa tu apellido" name="apellido" required autofocus>
				</div>

				<div class="form-group">
					Teléfono:<input type="text" class="form-control" placeholder="Ingresa tu Teléfono" name="telefono" required autofocus>
				</div>
				<div class="form-group">
					Dirección:<input type="text" class="form-control" placeholder="Ingresa tu Dirección" name="direccion" required autofocus>
				</div>

				<div class="col-xs-6">
				<button class="btn btn-lg btn-primary btn-block" type="submit">ENVIAR</button></div>

	    </form>
   </div>
   </div>

   </div>
   <br>
   <div>  <?php
	require("footer.php");
 ?></div>

<script type="text/javascript">

	$("document").ready(function(){

				$("#cedula").change(function(){

					var cedula = $("#cedula").val();
					$.get("../../C/con_validar.php",{param_id:cedula,tag: 'vocero'})
					.done(function(data){
						$("#usu").html(data);
					})
				})
			})
</script>
</body>


</html>
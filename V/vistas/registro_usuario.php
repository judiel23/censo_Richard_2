<?php
require("../../C/session.php");
require("../css/css.php");
require ("menu.php");
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de Usuario</title>
	<style>#form{
		padding-top: 200px;

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
	<div class="col-md-12">

<form class="form-horizontal" id="form" action="../../c/con_registrar_usuario.php" method="POST">
<input type="hidden" name="usu" value="<?php echo $_SESSION['usu_cedula']; ?>">

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4"> Cédula:</label>
					<div class="col-md-4">
					<input type="text" id ='cedula' class="form-control" placeholder="Ingresa tu Cédula" name="cedula" required autofocus>
					<div id='usu'></div>
				</div>
				</div>

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4"> Nombre:</label>
					<div class="col-md-4">
					<input type="text" class="form-control" placeholder="Ingresa tu Nombre" name="nombre" required autofocus>
				</div>
				</div>

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4"> Apellido:</label>
					<div class="col-md-4">

					<input type="text" class="form-control" placeholder="Ingresa tu Apellido" name="apellido" required autofocus>
				</div>
				</div>

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4"> Clave:</label>
					<div class="col-md-4">

					<input type="password" class="form-control" placeholder="Ingresa tu Clave" name="clave" required autofocus>
				</div>
				</div>

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4"> Confirmar Clave:</label>
					<div class="col-md-4">
					<input type="password" class="form-control" placeholder="Confirma tu Clave" name="clave_confi" required autofocus>
				</div>
				</div>

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4"> Teléfono:</label>
					<div class="col-md-4">
					<input type="text" class="form-control" placeholder="Ingresa tu Teléfono" name="telefono" required autofocus>
				</div>
				</div>

				<div class="form-group">
					<label for="cedula" class="control-label col-md-4"> Correo:</label>
					<div class="col-md-4">
					<input type="mail" class="form-control" placeholder="Ingresa tu Correo" name="correo" required autofocus>
				</div>
				</div>

				<div class="form-group">
					<label for="" class="control-label col-md-4"> Perfil:</label>
					<div class="col-md-3">
					<select name="perfil" class="form-control" required autofocus>
						<option value="">seleccione</option>
						<option value="1">administrador</option>
						<option value="2">usuario</option>
					</select>
				</div>
				</div>

				<div class="col-md-3 col-md-offset-4">
					<button class="btn btn-lg btn-primary btn-block " type="submit">ENVIAR</button>
				</div>


	    </form>
   </div>
   </div>
   <br>

   </div>
<script type="text/javascript">

	$("document").ready(function(){

				$("#cedula").change(function(){

					var cedula = $("#cedula").val();
					$.get("../../C/con_validar.php",{param_id:cedula,tag: 'usuario'})
					.done(function(data){
						$("#usu").html(data);
					})
				})
			})
</script>
<?php
	require("footer.php");
 ?>
</body>


</html>
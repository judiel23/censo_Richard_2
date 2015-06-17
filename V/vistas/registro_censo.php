<?php
require("../../C/session.php");
require("../CSS/css.php");
 require ("menu.php");
 ?>
 <!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Registro de Censo</title>
	<style>#form{
		margin-top: 0px;

		}
		input[type="text"],input[type="password"],input[type="mail"],input[type="number"]{ width:350px;   /*decoracion dentro del formulario*/
                    height:35px;
	border-radius:3px;
}
#c{
	height:110px;
	z-index: 10;
}
#sexo{
	width:350px;   /*decoracion dentro del formulario*/
                    height:40px;
	border-radius:3px;
}
		</style>
</head>
<body>
	<div class="container-fluid">


		<div class="row">

<div class="col-xs-4"></div>
	<div class="col-xs-6">

<form class="form-group" id="form" action="../../c/con_registrar_censo.php" method="POST">
<input type="hidden" name="usua"value="<?php echo $_SESSION['usu_cedula']; ?>">
				<div class="form-group">
					Cédula:<input type="text" class="form-control" id= "cedula" placeholder="Ingresa tu Cédula" name="cedula" required autofocus>

					<div id="usu"></div>
				</div>

				<div class="form-group">
					 Primer  Nombre:<input type="text" class="form-control" placeholder="Ingresa tu Primer Nombre " name="p_nombre" required autofocus>
				</div>
				<div class="form-group">
					 Segundo Nombre:<input type="text" class="form-control" placeholder="Ingresa tu Segundo Nombre " name="s_nombre" required autofocus>
				</div>
				<div class="form-group">
					Primer Apellido:<input type="text" class="form-control" placeholder="Ingresa tu Primer apellido" name="p_apellido" required autofocus>
				</div>
				<div class="form-group">
					Segundo Apellido:<input type="text" class="form-control" placeholder="Ingresa tu Segundo apellido" name="s_apellido" required autofocus>
				</div>
				<div class="form-group">
					Nacionalidad:<input type="text" class="form-control" placeholder="Ingresa tu Nacionalidad" name="nacionalidad" required autofocus>
				</div>
				<div class="form-group">
					Teléfono:<input type="text" class="form-control" placeholder="Ingresa tu Teléfono" name="telefono" required autofocus>
				</div>
				<div class="form-group">
					Dirección:<input type="text" class="form-control" placeholder="Ingresa tu Dirección" name="direccion" required autofocus>
				</div>
				<div class="form-group">
					Edad:<input type="text" class="form-control" placeholder="Ingresa tu edad" name="edad" required autofocus>
				</div>
				<div class="form-group">
					Genero:<select id="sexo" name="genero" class="form-control" required name='sexo'>
  							<option value="">seleccione </option>
  							<option value="Masculino">Masculino</option>
						          <option value="Femenino">Femenino</option>

							</select>
				</div>

				<div class="col-xs-6">
				<button class="btn btn-lg btn-primary btn-block" type="submit">ENVIAR</button></div>

	    </form>
   </div>
   </div>

   </div>
      <?php
	require("footer.php");
 ?>
<script type="text/javascript">

	$("document").ready(function(){

				$("#cedula").change(function(){

					var cedula = $("#cedula").val();
					$.get("../../C/con_validar.php",{param_id:cedula,tag: 'censo'})
					.done(function(data){
						$("#usu").html(data);
					})
				})
			})
</script>
</body>


</html>
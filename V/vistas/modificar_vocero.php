<?php
require("../../C/session.php");
require("../css/css.php");
require ("menu.php");
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Modificar usuario</title>
	<style>#doc{

		height: 80%
		}#c{
	height:110px;
	z-index: 10;
}</style>
</head>
<body>
<div class="container-fluid" id="doc">
<div class="row">


<div class='col-xs-8'>
	<form >
		<input id="usua" type="hidden" value="<?php echo $_SESSION['usu_cedula']; ?>">
		<label for="cedula">Cédula de vocero a modificar</label><input id="cedula" class="form-control" type="text" name="cedula" placeholder=" inserte número de cédula" required>
		<div class="col-xs-3"><input id="bot" class="btn-primary " type="button" value="consultar"></div>
	</form>
	<div id="usu"></div>
	<div id="modi" ></div>
</div>
</div></div>
</body>




	<?php
		require("footer.php");
	 ?>
<script type="text/javascript">
	$("document").ready(function(){

				$("#bot").click(function(){

					var cedula = $("#cedula").val();
					var usuario = $("#usua").val();
					$.get("../../C/con_validar_vocero.php",{param_id:cedula, usua:usuario})
					.done(function(data){
						$("#usu").html(data);
					})
				})
			})
</script>
</html>
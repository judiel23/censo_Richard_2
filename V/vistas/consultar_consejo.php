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
		body{
padding-top:0px;
		}
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
		<label for="cedula">RIF de consejo a modificar</label><input id="cedula" class="form-control" type="text" name="cedula" placeholder=" inserte número de RIF" required>
		<div class="col-xs-3"><input id="bot" class="btn-primary " type="button" value="consultar"></div>
	</form>
	<div id="usu"></div>
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
					$.get("../../C/con_consultar_consejo.php",{param_id:cedula})
					.done(function(data){
						$("#usu").html(data);
					})
				})
			})
</script>
</html>
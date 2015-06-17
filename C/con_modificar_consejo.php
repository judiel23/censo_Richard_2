<?php

if ($_GET['cedula']!='') {
$cedula = $_GET['cedula'];
$nombre=$_GET['nombre'];
$direccion=$_GET['direccion'];
$representante=$_GET['representante'];

$usua=$_GET['usua'];

}else{
	$cedula=1;
}

require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require ('../M/consejo/mod_consejo.php');

	$consejo = new consejo();
$consulta=$consejo->modificar($cedula, $nombre,$direccion, $representante, $usua, $pgconn);


if($consulta){

	echo '

consejo modificado con exito!!!!
';
}else{
	echo'<div class="col-xs-4" > <p> Cedula incorrecta</p></div>';
}
?>
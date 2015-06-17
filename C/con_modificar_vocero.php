<?php

if ($_GET['cedula']!='') {
$cedula = $_GET['cedula'];
$nombre=$_GET['nombre'];
$apellido=$_GET['apellido'];
$telefono=$_GET['telefono'];
$direccion=$_GET['direccion'];
$usua=$_GET['usua'];

}else{
	$cedula=1;
}

require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require ('../M/vocero/mod_vocero.php');

	$vocero = new vocero();
$consulta=$vocero->modificar($cedula, $nombre,$apellido, $telefono, $direccion,$usua, $pgconn);


if($consulta){

	echo '

vocero modificado con exito!!!!
';
}else{
	echo '

vocero modificado con exito!!!!
';
}
?>
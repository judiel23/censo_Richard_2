<?php

if ($_GET['cedula']!='') {
$cedula = $_GET['cedula'];
$nombre=$_GET['nombre'];
$apellido=$_GET['apellido'];
$telefono=$_GET['telefono'];
$correo=$_GET['correo'];
$usua=$_GET['usua'];

}else{
	$cedula=1;
}

require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require ('../M/usuario/mod_usuario.php');

	$usuario = new usuario();
$consulta=$usuario->modificar($cedula, $nombre,$apellido, $telefono, $correo,$usua, $pgconn);


if($consulta){

	echo '

usuario modificado con exito!!!!
';
}else{
	echo'<div class="col-xs-4" > <p> Cedula incorrecta</p></div>';
}
?>
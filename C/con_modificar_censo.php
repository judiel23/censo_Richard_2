<?php

if ($_GET['cedula']!='') {
$cedula = $_GET['cedula'];
$pnombre=$_GET['pnombre'];
$snombre=$_GET['snombre'];
$papellido=$_GET['papellido'];
$sapellido=$_GET['sapellido'];
$telefono=$_GET['telefono'];
$direccion=$_GET['direccion'];
$edad=$_GET['edad'];
$sexo=$_GET['sexo'];
$usua=$_GET['usua'];

}else{
	$cedula=1;
}

require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require ('../M/censo/mod_censo.php');

	$censo = new censo();
$consulta=$censo->modificar($cedula, $pnombre,$snombre, $papellido,$sapellido, $telefono, $direccion,$edad,$sexo,$usua, $pgconn);


if($consulta){

	echo '

censo modificado con exito!!!!
';
}else{
	echo'<div class="col-xs-4" > <p> Cedula incorrecta</p></div>';
}
?>
<?php
session_start();
$inactivo =21600;
$_SESSION['usu_cedula'];
$_SESSION['per_id'];
$_SESSION['usu_clave'];


if(!isset($_SESSION['usu_cedula'])){
	header('Location: index.php');
	 }else{
		}
if(isset($_SESSION['time']))
{
	$vida_session=time() - $_SESSION['time'];
		if($vida_session > $inactivo)
			{

			session_destroy();
				header('Location: index.php');}

}
$_SESSION['time'] = time ();

?>
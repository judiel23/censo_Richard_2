<?php
	$usu_cedula=		$_POST['cedula'];
	$usu_clave=		$_POST['clave'];
   $_SESSION['usu_cedula']= 	$usu_cedula;
   $_SESSION['usu_clave'] =	$usu_clave;


	require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();

	require ('../M/usuario/mod_usuario.php');
		$instanciar = new usuario();
		$columna = $instanciar->autenticar($usu_cedula,$usu_clave,$pgconn);

	if(pg_num_rows ($columna)>0){
		session_start();
		$row = pg_fetch_array($columna,0,PGSQL_ASSOC);
		$_SESSION["usu_cedula"]=$row["usu_cedula"];
		$_SESSION["usu_clave"]=$row["usu_clave"];
		$_SESSION["per_id"]=$row["per_id"];
		header("Location: ../V/vistas/inicio.php");
	}
	else{
		$mensaje="Sus datos no coinciden";
	}
	if($mensaje!="") { echo $mensaje;}
?>
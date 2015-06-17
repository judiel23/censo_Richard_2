<?php
	require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();

	$usu_cedula=		trim($_POST['cedula']);
	$usu_nombre=	trim($_POST['nombre']);
	$usu_apellido=	trim($_POST['apellido']);
	$usu_clave=		trim($_POST['clave']);
	$usu_clave_confi=	trim($_POST['clave_confi']);
	$usu_telefono=	trim($_POST['telefono']);
	$usu_correo=		trim($_POST['correo']);
	$usu_perfil=		trim($_POST['perfil']);
	$usu_re=		trim($_POST['usu']);

	require ('../M/usuario/mod_usuario.php');

	$usuario = new usuario();
	if($usu_clave!=$usu_clave_confi){
		die("Las claves no coinciden");
	}
	else{
			$inserto=$usuario->agregar($usu_cedula,$usu_nombre,$usu_apellido,$usu_clave,$usu_telefono,$usu_correo,$usu_perfil,$usu_re,$pgconn);

			if($inserto==true){

				echo "<script>alert('usuario registrado con exito!!!')
				location.href='../V/vistas/registro_usuario.php';
				</script>";

				/*$usuario=$objusuario->obtenerPorCreacion($emp_creacion,$pgconn);
				if(pg_num_rows($empleados)>0){
				$row=pg_fetch_row($usuario,0);
				header("Location: ../vistas/empleados/vis_empleadoRegistrado.php?Emp=".$row[0]);*/
			}
			else{

				echo"no resgistrado";
				//header("Location: ../vistas/empleados/vis_empleadoRegistrado.php");
			}
		/*}else{
			$actualizar=$objEmpleado->modificar($emp_nombre,$emp_apellido,$emp_cedula,$emp_telefono,$emp_turno,$emp_correo,$emp_login,$emp_clave,$car_cod,$emp_codigo,$pgconn);
			if($actualizar==true){
				header("Location: ../vistas/empleados/vis_empleadoRegistrado.php?Emp=".$emp_codigo);
			}
			else{
				header("Location: ../vistas/empleados/vis_empleadoRegistrado.php");
			}*/

}

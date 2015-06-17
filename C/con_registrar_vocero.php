<?php
	require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();

	$voc_cedula=		trim($_POST['cedula']);
	$voc_nombre=	trim($_POST['nombre']);
	$voc_apellido=	trim($_POST['apellido']);
	$voc_telefono=	trim($_POST['telefono']);
	$voc_direccion=		trim($_POST['direccion']);
	$usua=		trim($_POST['usua']);

	require ('../M/vocero/mod_vocero.php');

	$vocero = new vocero();


			$inserto=$vocero->agregar($voc_cedula,$voc_nombre,$voc_apellido,$voc_telefono,$voc_direccion,$usua,$pgconn);

			if($inserto==true){

				echo "<script>alert('vocero registrado con exito!!!');
location.href='../V/vistas/registro_vocero.php';
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



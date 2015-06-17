<?php
	require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();

	$con_rif=		trim($_POST['rif']);
	$con_nombre=	trim($_POST['nombre']);
	$con_direccion=	trim($_POST['direccion']);
	$con_rep=		trim($_POST['representante']);
$usua=		trim($_POST['usua']);
	require ('../M/consejo/mod_consejo.php');

	$consejo = new consejo();


			$inserto=$consejo->agregar($con_rif,$con_nombre,$con_direccion,$con_rep,$usua,$pgconn);

			if($inserto==true){

				echo "<script>alert('vocero registrado con exito!!!');
				location.href='../V/vistas/registro_consejos.php';

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



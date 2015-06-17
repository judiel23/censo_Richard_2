<?php
	require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();

	$cen_cedula =	trim($_POST['cedula']);
	$cen_pnombre=	trim($_POST['p_nombre']);
	$cen_snombre=	trim($_POST['s_nombre']);
	$cen_papellido=	trim($_POST['p_apellido']);
	$cen_sapellido =	trim($_POST['s_apellido']);
	$cen_nacionalidad =	trim($_POST['nacionalidad']);
	$cen_telefono =	trim($_POST['telefono']);
	$cen_direccion =	trim($_POST['direccion']);
	$cen_edad =	trim($_POST['edad']);
	$cen_genero =	trim($_POST['genero']);
	$usua=		trim($_POST['usua']);
	require ('../M/censo/mod_censo.php');

	$censo = new censo();


			$inserto=$censo->agregar($cen_cedula,$cen_pnombre,$cen_snombre,$cen_papellido,$cen_sapellido,$cen_nacionalidad,$cen_telefono,$cen_direccion,$cen_edad,$cen_genero,$usua,$pgconn);

			if($inserto==true){

				echo "<script>alert('censo registrado con exito!!!');
location.href='../V/vistas/registro_censo.php';
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



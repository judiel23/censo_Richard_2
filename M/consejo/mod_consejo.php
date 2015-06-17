<?php
class consejo
{
private $con_rif;
private $con_nombre;
private $con_direccion;
private $con_rep;
          private $pgconn;

    public function agregar($con_rif,$con_nombre,$con_direccion,$con_rep,$usua,$pgconn)
	{
		$con_created_at=date("Y-m-d h:i:sa");
		$con_updated_at=date("Y-m-d h:i:sa");
		$srt="creado Consejo ".$con_rif;
		$query = "INSERT INTO consejos (con_rif,con_nombre,con_direccion,con_representante,con_created_at,con_updated_at )
				VALUES('$con_rif','$con_nombre','$con_direccion','$con_rep','$con_created_at','$con_updated_at');
INSERT INTO auditoria (au_action,usu_cedula, au_date)VALUES('$srt','$usua','$con_updated_at');
				";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }


    public function modificar($con_rif,$con_nombre,$con_direccion,$con_representante,$usua,$pgconn){
			$dat=date("Y-m-d h:i:sa");
    $srt="modificar consejo RIF ".$con_rif;
		$query = "UPDATE consejos SET con_nombre='$con_nombre',  con_direccion='$con_direccion', con_representante='$con_representante', con_updated_at='$dat'
				 WHERE con_rif='$con_rif'";
		$rec = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		if ($rec)
        {     $q = "INSERT INTO auditoria (au_action,usu_cedula, au_date)VALUES('$srt','$usua','$dat'); ";
		$r = pg_query($pgconn,$q);

			return "ok";
		}
		else
		{
			return "nok";
		}

    }
    public function eliminar($cod_cuestionario,$cod_aspecto,$pgconn)
	{
		$query = "DELETE FROM empleado WHERE emp_cod='$emp_cod'";
		$eliminar = pg_query($query);
		if($eliminar)
			return "ok";
    }

    public function consultar($pgconn)
    {
 		$query = "select * from consejo";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function obtener($emp_cod,$pgconn)
    {
 		$query = "select E.*,C.* from empleado E LEFT JOIN cargo C ON E.car_cod=C.car_cod WHERE emp_cod='$emp_cod'";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function obtenerPorRif($con_rif,$pgconn)
    {
 		$query = "select * from consejos WHERE con_rif='$con_rif'";
		$consulta = pg_query($query) or die("Rif incorrecto");
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function obtenerPorCreacion($emp_creacion,$pgconn)
    {
 		$query = "select emp_cod from empleado WHERE emp_creacion='$emp_creacion'";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}



	public function autenticar($usu_cedula,$usu_clave,$pgconn){
 		$query = "select * from usuario WHERE usu_cedula='$usu_cedula'
				  AND usu_clave=md5('$usu_clave')";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function listar($pgconn)
    {
 		$query = "SELECT * FROM empleado";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

}
?>
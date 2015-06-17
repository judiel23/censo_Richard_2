<?php
class vocero
{
private $voc_cedula;
private $voc_nombre;
private $voc_apellido;
private $voc_telefono;
private $voc_direccion;
          private $pgconn;

    public function agregar($voc_cedula,$voc_nombre,$voc_apellido,$voc_telefono,$voc_direccion,$usu_re,$pgconn)
	{
		$voc_created_at=date("Y-m-d h:i:sa");
		$voc_updated_at=date("Y-m-d h:i:sa");
		$srt="creado vocero CI ".$voc_cedula;
		$query = "INSERT INTO voceros (voc_cedula,voc_nombre,voc_apellido,voc_telefono,voc_direccion,voc_created_at,voc_updated_at)
				VALUES('$voc_cedula','$voc_nombre','$voc_apellido','$voc_telefono','$voc_direccion','$voc_created_at','$voc_updated_at');
INSERT INTO auditoria (au_action,usu_cedula, au_date)VALUES('$srt','$usu_re','$voc_updated_at');
				";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }


    public function modificar($voc_cedula,$voc_nombre,$voc_apellido,$voc_telefono,$voc_direccion,$usu_re,$pgconn)
	{
		$dat=date("Y-m-d h:i:sa");
    $srt="modificar vocero CI  ".$voc_cedula;
		$query = "UPDATE voceros SET  voc_nombre='$voc_nombre', voc_apellido='$voc_apellido', voc_telefono='$voc_telefono', voc_direccion='$voc_direccion',voc_updated_at='$dat'
				 WHERE voc_cedula='$voc_cedula'";
		$rec = pg_query($pgconn,$query) ;
		if ($rec)
        {

        	$q="INSERT INTO auditoria (au_action,usu_cedula, au_date)VALUES('$srt','$usu_re','$dat');";
        	pg_query($pgconn,$q);

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
 		$query = "select * from vocero";
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

  public function obtenerPorCedula($voc_cedula,$pgconn)
    {
 		$query = "select * from voceros WHERE voc_cedula='$voc_cedula'";
		$consulta = pg_query($query) or die("Cedula incorrecta");
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
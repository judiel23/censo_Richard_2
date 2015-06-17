<?php
class usuario
{
	private $usu_cedula;
	private $usu_nombre;
   	private $usu_apellido;
   	private $usu_clave;
    	private $usu_telefono;
    	private $usu_correo;
          private $pgconn;

    public function agregar($usu_cedula,$usu_nombre,$usu_apellido, $usu_clave, $usu_telefono,$usu_correo,$usu_perfil,$usu_re, $pgconn)

	{

		$dat=date("Y-m-d h:i:sa");
    $srt="agregar usuario CI  ".$usu_cedula;
		$query = "INSERT INTO usuarios (usu_cedula,usu_nombre,usu_apellido, usu_clave, usu_telefono,usu_correo,per_id)
				VALUES('$usu_cedula','$usu_nombre','$usu_apellido', MD5('$usu_clave'), '$usu_telefono','$usu_correo','$usu_perfil');
			INSERT INTO auditoria (au_action,usu_cedula, au_date)VALUES('$srt','$usu_re','$dat');
				";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }


    public function modificar($usu_cedula,$usu_nombre,$usu_apellido,$usu_telefono,$usu_correo, $usua,$pgconn)
	{
			$dat=date("Y-m-d h:i:sa");
    $srt="modificar usuario CI  ".$usu_cedula;
		$query = "UPDATE usuarios SET usu_nombre='$usu_nombre',  usu_apellido='$usu_apellido', usu_telefono='$usu_telefono', usu_correo='$usu_correo'
				 WHERE usu_cedula='$usu_cedula'";
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
 		$query = "SELECT * FROM usuario";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function obtener($emp_cod,$pgconn)
    {
 		$query = "SELECT E.*,C.* FROM empleado E LEFT JOIN cargo C ON E.car_cod=C.car_cod WHERE emp_cod='$emp_cod'";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function obtenerPorCedula($usu_cedula,$pgconn)
    {
    	$dat=date("Y-m-d h:i:sa");
    $srt="consultar usuario CI  ".$usu_cedula;
 		$query = "SELECT * FROM usuarios WHERE usu_cedula='$usu_cedula'";
		$consulta = pg_query($query) or die("Cedula incorrecta");
		if ($consulta)
		{
			$q="INSERT INTO auditoria (au_action,usu_cedula, au_date)VALUES('$srt','$usu_cedula','$dat');";
			$con = pg_query($q);
			return $consulta;
		}
	}

    public function obtenerPorCreacion($emp_creacion,$pgconn)
    {
 		$query = "SELECT emp_cod FROM empleado WHERE emp_creacion='$emp_creacion'";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}



	public function autenticar($usu_cedula,$usu_clave,$pgconn){
 		$query = "SELECT * FROM usuarios WHERE usu_cedula='$usu_cedula'
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
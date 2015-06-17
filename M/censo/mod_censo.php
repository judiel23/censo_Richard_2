<?php
class censo
{
private $cen_cedula;
private $cen_pnombre;
private $cen_snombre;
private $cen_papellido;
private $cen_sapellido;
private $cen_nacionalidad;
private $cen_telefono;
private $cen_direccion;
          private $pgconn;

    public function agregar($cen_cedula,$cen_pnombre,$cen_snombre,$cen_papellido,$cen_sapellido,$cen_nacionalidad,$cen_telefono,$cen_direccion,$cen_edad,$cen_genero,$usua,$pgconn)
	{
		$con_created_at=date("Y-m-d h:i:sa");
		$con_updated_at=date("Y-m-d h:i:sa");
		$srt="CENSO de Ci ".$cen_cedula." creado";
		$query = "INSERT INTO censos (cen_cedula,cen_pnombre,cen_snombre,cen_papellido,cen_sapellido,cen_nacionalidad,cen_telefono,cen_direccion,cen_edad,cen_sexo,cen_created_at,cen_updated_at,usu_id)
				VALUES('$cen_cedula','$cen_pnombre','$cen_snombre','$cen_papellido','$cen_sapellido','$cen_nacionalidad','$cen_telefono','$cen_direccion','$cen_edad','$cen_genero', '$con_created_at','$con_updated_at','1');

INSERT INTO auditoria (au_action,usu_cedula, au_date)VALUES('$srt','$usua','$con_updated_at');
				";
		$consulta = pg_query($pgconn,$query) or die("Consulta errónea: ".pg_last_error());
		return $consulta;
    }


    public function modificar($cedula, $pnombre,$snombre, $papellido,$sapellido, $telefono, $direccion,$edad,$sexo,$usua, $pgconn){
			$dat=date("Y-m-d h:i:sa");
    $srt="modificar censo CI ".$cedula;
		$query = "UPDATE censos SET cen_pnombre='$pnombre',  cen_snombre='$snombre', cen_papellido='$papellido', cen_sapellido='$sapellido', cen_telefono='$telefono', cen_direccion='$direccion', cen_edad='$edad', cen_sexo='$sexo', cen_updated_at='$dat'
				 WHERE cen_cedula='$cedula'";
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


    public function consultar($pgconn)
    {
 		$query = "select * from censo";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function obtenerPorCedula($cen_cedula,$pgconn)
    {
 		$query = "select * from censos WHERE cen_cedula='$cen_cedula'";
		$consulta = pg_query($query) or die("RIF incorrecto");
		if ($consulta)
		{
			return $consulta;
		}
	}
    public function gra_cantidad($desde,$hasta,$pgconn)
    {
    	if ($desde=="" && $hasta=="") {
    	       $hasta=date('Ymd ');
        $desde=date('Ymd ',strtotime('-1 week'));
    	}
 		$query = "select count(cen_id) as cantidad from censos WHERE cen_updated_at BETWEEN  '$desde' AND  '$hasta'   ;";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function gra_edad($desde,$hasta,$pgconn)
    {
    	if ($desde=="" && $hasta=="") {
    	       $hasta=date('Ymd ');
        $desde=date('Ymd ',strtotime('-1 week'));
    	}
 		$query = "select cen_edad as edad, count(cen_edad) as cantidad from censos WHERE cen_updated_at BETWEEN  '$desde' AND  '$hasta'  group by cen_edad;";
		$consulta = pg_query($query) or die("Consulta errónea: ".pg_last_error());
		if ($consulta)
		{
			return $consulta;
		}
	}

    public function gra_sexo($desde,$hasta,$pgconn)
    {
    	if ($desde=="" && $hasta=="") {
    	       $hasta=date('Ymd ');
        $desde=date('Ymd ',strtotime('-1 week'));
    	}

 		$query = "select cen_sexo as sexo, count(cen_sexo) as cantidad from censos WHERE cen_updated_at BETWEEN  '$desde' AND  '$hasta' group by cen_sexo;";
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
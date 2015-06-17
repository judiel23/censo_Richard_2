<?php
if ($_GET['param_id']!='') {
$cedula = $_GET['param_id'];
}else{
	$cedula=1;
}

require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require ('../M/consejo/mod_consejo.php');

	$consejo = new consejo();
$consulta=$consejo->obtenerPorRif($cedula, $pgconn);


if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	echo '<table class="table">
    <thead>
        <tr>

            <th>Nombre del Consejo Comunal</th>
            <th>Dirección</th>
            <th>RIF</th>
            <th>Representante</th>


        </tr>
    </thead>


    <tbody>
        <tr>
            <td>'.$row["con_nombre"].' </td>
            <td>'.$row["con_direccion"].'</td>
            <td>'.$row["con_rif"].'</td>
            <td>'.$row["con_representante"].'</td>


        </tr>
    </tbody>


</table>';
}else{
	echo'<div class="col-xs-4" > <p> RIF incorrecto</p></div>';
}
?>
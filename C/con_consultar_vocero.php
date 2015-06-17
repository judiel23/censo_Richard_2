<?php
if ($_GET['param_id']!='') {
$cedula = $_GET['param_id'];
}else{
	$cedula=1;
}

require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require ('../M/vocero/mod_vocero.php');

	$vocero = new vocero();
$consulta=$vocero->obtenerPorCedula($cedula, $pgconn);


if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	echo '<table class="table">
    <thead>
        <tr>

            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Telefono</th>
            <th>Dirección</th>

        </tr>
    </thead>


    <tbody>
        <tr>
            <td>'.$row["voc_nombre"].' </td>
            <td>'.$row["voc_apellido"].'</td>
            <td>'.$row["voc_cedula"].'</td>
            <td>'.$row["voc_telefono"].'</td>
            <td>'.$row["voc_direccion"].'</td>

        </tr>
    </tbody>


</table>';
}else{
	echo'<div class="col-xs-4" > <p> Cedula incorrecta</p></div>';
}
?>
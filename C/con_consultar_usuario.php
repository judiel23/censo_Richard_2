<?php
if ($_GET['param_id']!='') {
$cedula = $_GET['param_id'];
$usua=$_GET['usua'];
}else{
	$cedula=1;
}

require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require ('../M/usuario/mod_usuario.php');

	$usuario = new usuario();
$consulta=$usuario->obtenerPorCedula($cedula,$usua, $pgconn);


if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	echo '<table class="table">
    <thead>
        <tr>

            <th>Nombre</th>
            <th>Apellido</th>
            <th>Cedula</th>
            <th>Telefono</th>
            <th>Correo</th>

        </tr>
    </thead>


    <tbody>
        <tr>
            <td>'.$row["usu_nombre"].' </td>
            <td>'.$row["usu_apellido"].'</td>
            <td>'.$row["usu_cedula"].'</td>
            <td>'.$row["usu_telefono"].'</td>
            <td>'.$row["usu_correo"].'</td>

        </tr>
    </tbody>


</table>';
}else{
	echo'<div class="col-xs-4" > <p> Cedula incorrecta</p></div>';
}
?>
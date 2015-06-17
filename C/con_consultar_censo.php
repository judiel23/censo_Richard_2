<?php
if ($_GET['param_id']!='') {
$cedula = $_GET['param_id'];
}else{
	$cedula=1;
}

require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();
require ('../M/censo/mod_censo.php');

	$censo = new censo();
$consulta=$censo->obtenerPorCedula($cedula, $pgconn);


if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	echo '<table class="table">
    <thead>
        <tr>

            <th>Primer Nombre </th>
            <th>Segundo Nombre </th>
            <th>Primer Apellido </th>
            <th>Segundo Apellido </th>
            <th>Cédula</th>
            <th>Nacionalidad</th>
            <th>Teléfono</th>
           <th>Dirección</th>
                   <th>Edad</th>
                   <th>Sexo</th>

        </tr>
    </thead>


    <tbody>
        <tr>
            <td>'.$row["cen_pnombre"].' </td>
             <td>'.$row["cen_snombre"].' </td>
               <td>'.$row["cen_papellido"].' </td>
               <td>'.$row["cen_sapellido"].' </td>

            <td>'.$row["cen_cedula"].'</td>
                   <td>'.$row["cen_nacionalidad"].'</td>
                          <td>'.$row["cen_telefono"].'</td>
            <td>'.$row["cen_direccion"].'</td>
            <td>'.$row["cen_edad"].'</td>
  <td>'.$row["cen_sexo"].'</td>

        </tr>
    </tbody>


</table>';
}else{
	echo'<div class="col-xs-4" > <p> Cédula incorrecta</p></div>';
}
?>
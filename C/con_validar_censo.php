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
require ('../M/censo/mod_censo.php');

	$censo = new censo();
$consulta=$censo->obtenerPorCedula($cedula, $pgconn);


if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	echo '<table class="table">
    <thead>
        <tr>

            <th> Primer Nombre</th>
            <th>Segundo Nombre</th>
          <th>Primer Apellido</th>
          <th>Segundo Apellido</th>

            <th>Telefono</th>
            <th>Dirección</th>
            <th>Edad</th>
            <th>Sexo</th>

        </tr>
    </thead>


    <tbody><form action="../../C/con_modificar_usuario-php" method="post" >
        <tr>
<input type ="hidden"  id ="usua"class="form-control" type ="hidden" value="'.$usua.'">
 <input type ="hidden"  id="ce" class="form-control" type ="hidden" value="'.$row["cen_cedula"].'">
            <td><input type ="text" id="pnom" class="form-control" value="'.$row["cen_pnombre"].' "></td>
            <td><input type ="text" id="snom"  class="form-control" value="'.$row["cen_snombre"].'"></td>

            <td><input type ="text"  id="pape" class="form-control" value="'.$row["cen_papellido"].'"></td>
            <td><input type ="text" id="sape"  class="form-control" value="'.$row["cen_sapellido"].'"></td>
<td><input type ="text" id="tel"  class="form-control" value="'.$row["cen_telefono"].'"></td>
<td><input type ="text" id="dire"  class="form-control" value="'.$row["cen_direccion"].'"></td>
<td><input type ="text" id="eda"  class="form-control" value="'.$row["cen_edad"].'"></td>
<td><input type ="text" id="sex"  class="form-control" value="'.$row["cen_sexo"].'"></td>

        </tr>
<tr><td><input type="submit" id="mod" class="btn-primary" value="enviar"></td></tr>
        </form>
    </tbody>


</table>

<script type="text/javascript">

                $("#mod").click(function(){
                    var usua=$("#usua").val();
                var ced=$("#ce").val();
                var pnombre = $("#pnom").val();
                var snombre= $("#snom").val();
                var papellido = $("#pape").val();
                var sapellido= $("#sape").val();
                var telefono= $("#tel").val();
                var direccion = $("#dire").val();
                var edad = $("#eda").val();
                var sexo = $("#sex").val();
                $.get("../../C/con_modificar_censo.php",{cedula:ced,pnombre:pnombre,snombre:snombre,papellido:papellido,sapellido:sapellido,telefono:telefono,direccion:direccion,edad:edad,sexo:sexo,usua:usua})
                .done(function(dat) {
                    $("#modi").html(dat);
                })
                })

</script>
';
}else{
	echo'<div class="col-xs-4" > <p> Cedula incorrecta</p></div>';
}
?>
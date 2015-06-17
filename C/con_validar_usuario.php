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

            <th>Telefono</th>
            <th>Correo</th>

        </tr>
    </thead>


    <tbody>
        <tr>
         <input type ="hidden"  id ="usua"class="form-control" type ="hidden" value="'.$usua.'">
 <input type ="hidden"  id ="ced"class="form-control" type ="hidden" value="'.$row["usu_cedula"].'">
            <td><input type ="text" id="nom"class="form-control" value="'.$row["usu_nombre"].' "></td>
            <td><input type ="text" id="ape" class="form-control" value="'.$row["usu_apellido"].'"></td>

            <td><input type ="text" id="tel" class="form-control" value="'.$row["usu_telefono"].'"></td>
            <td><input type ="mail" id="mail" class="form-control" value="'.$row["usu_correo"].'"></td>


        </tr>
<tr><td><input type="button" id="mod" class="btn-primary" value="enviar"></td></tr>

    </tbody>


</table>
<script type="text/javascript">

                $("#mod").click(function(){
                    var usua=$("#usua").val();
                var ced=$("#ced").val();
                var nombre = $("#nom").val();
                var apellido= $("#ape").val();
                var telefono= $("#tel").val();
                var correo = $("#mail").val();
                $.get("../../C/con_modificar_usuario.php",{cedula:ced,nombre:nombre,apellido:apellido,telefono:telefono,correo:correo,usua:usua})
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
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

            <th>Telefono</th>
            <th>Dirección</th>

        </tr>
    </thead>


    <tbody><form action="../../C/con_modificar_usuario-php" method="post" >
        <tr>
 <input type ="hidden"  id="vc"class="form-control" type ="hidden" value="'.$row["voc_cedula"].'">
            <td><input type ="text" id="vn"class="form-control" value="'.$row["voc_nombre"].' "></td>
            <td><input type ="text" id="vap" class="form-control" value="'.$row["voc_apellido"].'"></td>

            <td><input type ="text" id="vtel" class="form-control" value="'.$row["voc_telefono"].'"></td>
            <td><input type ="text" id="vdic" class="form-control" value="'.$row["voc_direccion"].'"></td>


        </tr>
<tr><td><input type="submit" id="mod"class="btn-primary" value="enviar"></td></tr>
        </form>
    </tbody>


</table>

<script type="text/javascript">

                $("#mod").click(function(){
                    var usua=$("#usua").val();
                var ced=$("#vc").val();
                var nombre = $("#vn").val();
                var apellido= $("#vap").val();
                var telefono= $("#vtel").val();
                var direccion = $("#vdic").val();
                $.get("../../C/con_modificar_vocero.php",{cedula:ced,nombre:nombre,apellido:apellido,telefono:telefono,direccion:direccion,usua:usua})
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
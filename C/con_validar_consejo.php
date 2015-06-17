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
require ('../M/consejo/mod_consejo.php');

	$consejo = new consejo();
$consulta=$consejo->obtenerPorRif($cedula, $pgconn);


if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
	echo '<table class="table">
    <thead>
        <tr>

            <th>Nombre del consejo </th>
            <th>Dirección del consejo</th>

            <th>Representante</th>


        </tr>
    </thead>


    <tbody><form action="../../C/con_modificar_usuario-php" method="post" >
        <tr>
         <input type ="hidden"  id ="usua"class="form-control" type ="hidden" value="'.$usua.'">
 <input type ="hidden"  id="rif"class="form-control" type ="hidden" value="'.$row["con_rif"].'">
            <td><input type ="text" id="nom" class="form-control" value="'.$row["con_nombre"].' "></td>
            <td><input type ="text" id="dir" class="form-control" value="'.$row["con_direccion"].'"></td>

            <td><input type ="text" id="rep" class="form-control" value="'.$row["con_representante"].'"></td>



        </tr>
<tr><td><input type="submit" id="mod" class="btn-primary" value="enviar"></td></tr>
        </form>
    </tbody>


</table>

<script type="text/javascript">

                $("#mod").click(function(){
                    var usua=$("#usua").val();
                var ced=$("#rif").val();
                var nombre = $("#nom").val();
                var direccion= $("#dir").val();
                var representante= $("#rep").val();

                $.get("../../C/con_modificar_consejo.php",{cedula:ced,nombre:nombre,direccion:direccion,representante:representante,usua:usua})
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
<?php
// Se establece la conexión a la base de datos


require ('../../M/usuario/mod_connex.php');

require("../../M/censo/mod_censo.php");

function cant($desde,$hasta){

	$conexion = new Connex();
	$pgconn= $conexion->conectar();


	$consulta= new censo();

	$resultado= $consulta->gra_cantidad($desde,$hasta,$pgconn);
if($resultado){




 //$array[$i] = array( $b,$a );


$cons= ' existen '.pg_num_rows($resultado).' registros ';


		echo "$cons";

			}// if
}

 function edad($desde,$hasta){
 	$conexion = new Connex();
	$pgconn= $conexion->conectar();


	$consulta= new censo();

	$resultado= $consulta->gra_edad($desde,$hasta,$pgconn);
if($resultado){

			 for($i=0; $i<pg_num_rows($resultado); $i++){
 $row= pg_fetch_array($resultado, $i,PGSQL_ASSOC);
 $a=$row["cantidad"];
 $b=$row["edad"];

 //$array[$i] = array( $b,$a );


$cons= "[' ".$b." años',".$a."],";



		echo "$cons";
			}
			}// if
                      }//end gar


 function sexo($desde,$hasta){
 	$conexion = new Connex();
	$pgconn= $conexion->conectar();


	$consulta= new censo();

	$resultado= $consulta->gra_sexo($desde,$hasta,$pgconn);
if($resultado){

			 for($i=0; $i<pg_num_rows($resultado); $i++){
 $row= pg_fetch_array($resultado, $i,PGSQL_ASSOC);
 $a=$row["cantidad"];
 $b=$row["sexo"];

 //$array[$i] = array( $b,$a );


$cons= "['".$b."',".$a."],";



		echo "$cons";
			}
			}// if
                      }//end gar



?>
<?php

if ($_GET['param_id']!='') {
$cedula = $_GET['param_id'];
}else{
	$cedula=1;
}

require ('../M/usuario/mod_connex.php');
		$conexion = new Connex();
		$pgconn=$conexion->conectar();

if ($_GET['tag']=='usuario') {
    usuario($cedula,$pgconn);
    # code...
}elseif ($_GET['tag']=='vocero') {
    vocero($cedula,$pgconn);
}elseif ($_GET['tag']=='censo') {
     censo($cedula,$pgconn);
}elseif ($_GET['tag']=='censo') {
  consejo($cedula,$pgconn);
}

      function consejo($cedula,$pgconn){
require ('../M/consejo/mod_consejo.php');

    $consejo= new consejo();
$consulta=$consejo->obtenerPorRif($cedula, $pgconn);


if(pg_num_rows($consulta)>0){
    $row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
echo'Esta RIF ya existe !!';
}else{

}}
        function vocero($cedula,$pgconn){
require ('../M/vocero/mod_vocero.php');

    $vocero= new vocero();
$consulta=$vocero->obtenerPorCedula($cedula, $pgconn);


if(pg_num_rows($consulta)>0){
    $row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
echo'Esta Cédula ya existe !!';
}else{

}}
        function censo($cedula,$pgconn){
require ('../M/censo/mod_censo.php');

   $censo= new censo();
$consulta=$censo->obtenerPorCedula($cedula, $pgconn);


if(pg_num_rows($consulta)>0){
    $row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
echo'Esta Cédula ya existe !!';
}else{

}}
        function usuario($cedula,$pgconn){
require ('../M/usuario/mod_usuario.php');

	$usuario= new usuario();
$consulta=$usuario->obtenerPorCedula($cedula, $pgconn);


if(pg_num_rows($consulta)>0){
	$row = pg_fetch_array($consulta,0,PGSQL_ASSOC);
echo'Esta Cédula ya existe !!';
}else{

}}
?>
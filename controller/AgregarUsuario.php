<?php

require_once("../model/Data.php");
require_once("../model/Usuario.php");

$data = new Data();


$id_perfil = isset($_REQUEST['id_perfil'])?$_REQUEST['id_perfil']:"";
$usuario = isset($_REQUEST['usuario'])?$_REQUEST['usuario']:"";
$clave = isset($_REQUEST['clave'])?$_REQUEST['clave']:"";
$nombres = isset($_REQUEST['nombres'])?$_REQUEST['nombres']:"";
$ap_paterno = isset($_REQUEST['ap_paterno'])?$_REQUEST['ap_paterno']:"";
$ap_materno = isset($_REQUEST['ap_materno'])?$_REQUEST['ap_materno']:"";
$email = isset($_REQUEST['email'])?$_REQUEST['email']:"";
$estado = isset($_REQUEST['estado'])?$_REQUEST['estado']:"";


$u = new Usuario(1,$id_perfil,$usuario,$clave,$nombres,$ap_paterno,$ap_materno,$email, $estado);

$data->crearUsuario($u);


?>

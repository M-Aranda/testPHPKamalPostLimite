<?php

require_once("../model/Data.php");
require_once("../model/Usuario.php");

$data = new Data();


$id_usuario = isset($_REQUEST['id_usuario'])?$_REQUEST['id_usuario']:"";



$data->eliminarUsuario($id_usuario);

?>
<?php
session_start();
require_once("../model/Data.php");


$nombre = $_REQUEST["nombre"];
$clave = $_REQUEST["clave"];

$d = new Data();

$usuario = $d->getUsuario($nombre, $clave);

if($usuario == null){
    
    header("location: ../view/error.php");
}else{
    $_SESSION["usuario"]=$usuario;
    
    header("location: ../view/mantenedor.php");
}
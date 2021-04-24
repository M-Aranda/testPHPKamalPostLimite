<?php

require_once("../model/Data.php");
require_once("../model/Usuario.php");
require_once("../model/Perfil.php");

$data = new Data();


$listadoDeUsuarios =  $data->listarUsuarios();


        $listadoDeUsuariosParaJSON = array();
        
        foreach ($listadoDeUsuarios as $u) {

            $estado = "Activo";
            if ($u->getEstado() == 0) {
                $estado = "Inactivo";
            }
            
            $usuarioParaArray = array("id_usuario" => $u->getId_usuario(), "Perfil Usuario" => $u->getPerfil()->getPerfil(), "Usuario" => $u->getUsuario(), "Nombres" => $u->getNombres(), "APaterno" => $u->getAp_paterno(), "AMaterno" => $u->getAp_materno(), "Email" => $u->getEmail(), "Estado" => $estado);
            array_push($listadoDeUsuariosParaJSON, $usuarioParaArray);
        }


echo json_encode($listadoDeUsuariosParaJSON);



?>
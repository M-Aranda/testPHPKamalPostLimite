<?php

require_once("Conexion.php");
require_once("Usuario.php");
require_once("Perfil.php");

class Data {

    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }

    public function usarConexion($query) {

        $this->con->conectar();
        $this->con->ejecutar($query);
        $this->con->desconectar();
    }

    public function getPerfil($id_perfil) {
        $query = "SELECT * from PERFIL WHERE id_perfil ='$id_perfil'";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);

        $perfil = null;

        if ($reg = $rs->fetch_array()) {
            $perfil = new Perfil($reg[0], $reg[1]);
        }



        return $perfil;
    }

    public function getUsuario($usuario, $clave) {
        $query = "SELECT * from USUARIO WHERE usuario ='$usuario' AND clave ='$clave'";

        $this->con->conectar();
        $rs = $this->con->ejecutar($query);

        $usuario = null;

        if ($reg = $rs->fetch_array()) {
            $usuario = new Usuario($reg[0], $this->getPerfil($reg[1]), $usuario, $clave, $reg[4], $reg[5], $reg[6], $reg[7], $reg[8]);
        }

        return $usuario;
    }
    
        public function getUsuarioAAlterar($id_usuario) {
        $query = "SELECT * from USUARIO WHERE id_usuario = 1";

        $this->con->conectar();
        
        $rs = $this->con->ejecutar($query);

        $usuario = null;

        if ($reg = $rs->fetch_array()) {
            $usuario = new Usuario($reg[0], $this->getPerfil($reg[1]), $reg[2], $reg[3], $reg[4], $reg[5], $reg[6], $reg[7], $reg[8]);
        }

        return $usuario;
    }

    public function listarUsuarios() {
        $query = "SELECT * FROM USUARIO";
        $this->con->conectar();
        $rs = $this->con->ejecutar($query);

        $usuarios = array();

        while ($reg = $rs->fetch_array()) {

            $usuario = new Usuario($reg[0], $this->getPerfil($reg[1]), $reg[2], $reg[3], $reg[4], $reg[5], $reg[6], $reg[7], $reg[8]);
            $usuarios[] = $usuario;
        }


        return $usuarios;
    }

    public function listarPerfiles() {
        $query = "SELECT * FROM PERFIL";
        $this->con->conectar();
        $rs = $this->con->ejecutar($query);

        $perfiles = array();

        while ($reg = $rs->fetch_array()) {

            $perfil = new Perfil($reg[0], $reg[1]);
            $perfiles[] = $perfil;
        }

        return $perfiles;
    }

    public function crearUsuario($usuario) {
        $query = "INSERT INTO USUARIO (id_perfil, usuario, clave, nombres, ap_paterno, ap_materno, email, estado) VALUES (" . $usuario->getPerfil() . ",'" . $usuario->getUsuario() . "','" . $usuario->getClave() . "','" . $usuario->getNombres() . "','" . $usuario->getAp_paterno() . "','" . $usuario->getAp_materno() . "','" . $usuario->getEmail() . "'," . $usuario->getEstado() . ");";

        $this->usarConexion($query);
    }

    public function modificarUsuario($usuario) {
        $query = "UPDATE  USUARIO SET id_perfil=" . $usuario->getPerfil() . ", usuario='" . $usuario->getUsuario() . "',clave='" . $usuario->getClave() . "',nombres='" . $usuario->getNombres() . "',ap_paterno='" . $usuario->getAp_paterno() . "',ap_materno='" . $usuario->getAp_materno() . "',email='" . $usuario->getEmail() . "',estado=" . $usuario->getEstado() . " WHERE id_usuario=".$usuario->getId_usuario().";";
        echo $query;
        $this->usarConexion($query);
    }

    public function eliminarUsuario($id_usuario) {
        $query = "DELETE FROM USUARIO WHERE id_usuario = " . $id_usuario . "";
        echo $query;
        $this->usarConexion($query);
    }

}

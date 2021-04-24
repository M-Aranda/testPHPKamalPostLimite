<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Usuario
 *
 * @author Chelo
 */
class Usuario {
    private $id_usuario;
    private $perfil;
    private $usuario;
    private $clave;
    private $nombres;
    private $ap_paterno;
    private $ap_materno;
    private $email;
    private $estado;
    
    
    public function __construct($id_usuario, $perfil, $usuario, $clave, $nombres, $ap_paterno, $ap_materno, $email, $estado) {
        $this->id_usuario = $id_usuario;
        $this->perfil = $perfil;
        $this->usuario = $usuario;
        $this->clave = $clave;
        $this->nombres = $nombres;
        $this->ap_paterno = $ap_paterno;
        $this->ap_materno = $ap_materno;
        $this->email = $email;
        $this->estado = $estado;
}

public function getId_usuario() {
    return $this->id_usuario;
}

public function getPerfil() {
    return $this->perfil;
}

public function getUsuario() {
    return $this->usuario;
}

public function getClave() {
    return $this->clave;
}

public function getNombres() {
    return $this->nombres;
}

public function getAp_paterno() {
    return $this->ap_paterno;
}

public function getAp_materno() {
    return $this->ap_materno;
}

public function getEmail() {
    return $this->email;
}

public function getEstado() {
    return $this->estado;
}

public function setId_usuario($id_usuario) {
    $this->id_usuario = $id_usuario;
}

public function setPerfil($perfil) {
    $this->perfil = $perfil;
}

public function setUsuario($usuario) {
    $this->usuario = $usuario;
}

public function setClave($clave) {
    $this->clave = $clave;
}

public function setNombres($nombres) {
    $this->nombres = $nombres;
}

public function setAp_paterno($ap_paterno) {
    $this->ap_paterno = $ap_paterno;
}

public function setAp_materno($ap_materno) {
    $this->ap_materno = $ap_materno;
}

public function setEmail($email) {
    $this->email = $email;
}

public function setEstado($estado) {
    $this->estado = $estado;
}



}

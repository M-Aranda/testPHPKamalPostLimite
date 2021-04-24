<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Perfil
 *
 * @author Chelo
 */
class Perfil {
    
    
    private $id_perfil;
    private $perfil;
    
    public function __construct($id_perfil, $perfil) {
        $this->id_perfil = $id_perfil;
        $this->perfil = $perfil;
    }
    
    public function getId_perfil() {
        return $this->id_perfil;
    }

    public function getPerfil() {
        return $this->perfil;
    }

    public function setId_perfil($id_perfil) {
        $this->id_perfil = $id_perfil;
    }

    public function setPerfil($perfil) {
        $this->perfil = $perfil;
    }




    
}

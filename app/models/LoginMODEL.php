<?php

/**
 * Descrição da LoginMODEL
 *
 * @author Samuel
 */

namespace app\models;

class LoginMODEL {
    
    private $usuario;
    private $senha;
    private $verificar;
    
    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getVerificar() {
        return $this->verificar;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setVerificar($verificar) {
        $this->verificar = $verificar;
    }

}

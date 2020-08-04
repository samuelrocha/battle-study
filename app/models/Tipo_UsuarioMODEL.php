<?php

/**
 * Descrição da Tipo_UsuarioMODEL
 *
 * @author Samuel
 */

namespace app\models;

class Tipo_UsuarioMODEL {
    private $id_tipo_usuario;
    private $tipo;
    
    // Metódos Especiais
    
    function __construct() {
        
    }

    public function getId_tipo_usuario() {
        return $this->id_tipo_usuario;
    }

    public function getTipo() {
        return $this->tipo;
    }

    public function setId_tipo_usuario($id_tipo_usuario) {
        $this->id_tipo_usuario = $id_tipo_usuario;
    }

    public function setTipo($tipo) {
        $this->tipo = $tipo;
    }

}

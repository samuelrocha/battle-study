<?php

/**
 * Descrição da JogadorMODEL
 *
 * @author Samuel
 */

namespace app\models;
require_once '../../vendor/autoload.php';

class JogadorMODEL extends UsuarioMODEL{
    private $id_jogador;
    private $fk_id_usuario;
    private $fk_id_organizacao;
    

    // Metódos especiais
    
    function __construct() {
      
    }

    public function getId_jogador() {
        return $this->id_jogador;
    }

    public function getFk_id_usuario() {
        return $this->fk_id_usuario;
    }

    public function getFk_id_organizacao() {
        return $this->fk_id_organizacao;
    }


    public function setId_jogador($id_jogador) {
        $this->id_jogador = $id_jogador;
    }

    public function setFk_id_usuario($fk_id_usuario) {
        $this->fk_id_usuario = $fk_id_usuario;
    }

    public function setFk_id_organizacao($fk_id_organizacao) {
        $this->fk_id_organizacao = $fk_id_organizacao;
    }

}

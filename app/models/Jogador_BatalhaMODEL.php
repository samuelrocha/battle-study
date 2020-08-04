<?php

/**
 * Descrição da Jogador_BatalhaMODEL
 *
 * @author Samuel
 */

namespace app\models;

class Jogador_BatalhaMODEL {
    private $fk_id_jogador;
    private $fk_id_batalha;
    private $pontos;
    private $resposta;
    
    // Metódos especiais
    
    function __construct() {
        
    }

    public function getFk_id_jogador() {
        return $this->fk_id_jogador;
    }

    public function getFk_id_batalha() {
        return $this->fk_id_batalha;
    }

    public function getPontos() {
        return $this->pontos;
    }

    public function getResposta() {
        return $this->resposta;
    }
    
    public function setFk_id_jogador($fk_id_jogador) {
        $this->fk_id_jogador = $fk_id_jogador;
    }

    public function setFk_id_batalha($fk_id_batalha) {
        $this->fk_id_batalha = $fk_id_batalha;
    }

    public function setPontos($pontos) {
        $this->pontos = $pontos;
    }

    public function setResposta($resposta) {
        $this->resposta = $resposta;
    }

}

<?php

/**
 * Descrição da ClassificacaoMODEL
 *
 * @author Samuel
 */

namespace app\models;

class ClassificacaoMODEL {
    
    private $id_classificacao;
    private $vitoria;
    private $posicao;
    private $fk_id_jogador;
    
    // Metódos Especiais
    
    function __construct() {
        
    }

    public function getId_classificacao() {
        return $this->id_classificacao;
    }

    public function getVitoria() {
        return $this->vitoria;
    }

    public function getPosicao() {
        return $this->posicao;
    }

    public function getFk_id_jogador() {
        return $this->fk_id_jogador;
    }

    public function setId_classificacao($id_classificacao) {
        $this->id_classificacao = $id_classificacao;
    }

    public function setVitoria($vitoria) {
        $this->vitoria = $vitoria;
    }

    public function setPosicao($posicao) {
        $this->posicao = $posicao;
    }

    public function setFk_id_jogador($fk_id_jogador) {
        $this->fk_id_jogador = $fk_id_jogador;
    }

}

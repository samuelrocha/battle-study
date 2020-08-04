<?php

/**
 * Descrição da BatalhaMODEL
 *
 * @author Samuel
 */

namespace app\models;

class BatalhaMODEL {

    private $id_batalha;
    private $tempo;
    private $pontos_termino;
    private $fk_id_questao;

    // Métodos Especiais

    function __construct() {
        
    }

    public function getId_batalha() {
        return $this->id_batalha;
    }

    public function getTempo(){
        return $this->tempo;
    }

    public function getPontos_termino() {
        return $this->pontos_termino;
    }

    public function getFk_id_questao() {
        return $this->fk_id_questao;
    }

    public function setId_batalha($id_batalha) {
        $this->id_batalha = $id_batalha;
    }

    public function setTempo($tempo) {
        $this->tempo = $tempo;
    }

    public function setPontos_termino($pontos_termino) {
        $this->pontos_termino = $pontos_termino;
    }

    public function setFk_id_questao($fk_id_questao) {
        $this->fk_id_questao = $fk_id_questao;
    }

}

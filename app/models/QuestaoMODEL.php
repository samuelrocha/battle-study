<?php

/**
 * Descrição da QuestaoMODEL
 *
 * @author Samuel
 */

namespace app\models;

class QuestaoMODEL {
    private $id_questao;
    private $pergunta;
    private $alternativa_a;
    private $alternativa_b;
    private $alternativa_c;
    private $alternativa_d;
    private $alternativa_e;
    private $verdadeira;

    // Métodos Especiais
    
    function __construct() {
        
    }

    public function getId_questao() {
        return $this->id_questao;
    }

    public function getPergunta() {
        return $this->pergunta;
    }

    public function getAlternativa_a() {
        return $this->alternativa_a;
    }

    public function getAlternativa_b() {
        return $this->alternativa_b;
    }

    public function getAlternativa_c() {
        return $this->alternativa_c;
    }

    public function getAlternativa_d() {
        return $this->alternativa_d;
    }

    public function getAlternativa_e() {
        return $this->alternativa_e;
    }

    public function getVerdadeira() {
        return $this->verdadeira;
    }

    public function setId_questao($id_questao) {
        $this->id_questao = $id_questao;
    }

    public function setPergunta($pergunta) {
        $this->pergunta = $pergunta;
    }

    public function setAlternativa_a($alternativa_a) {
        $this->alternativa_a = $alternativa_a;
    }

    public function setAlternativa_b($alternativa_b) {
        $this->alternativa_b = $alternativa_b;
    }

    public function setAlternativa_c($alternativa_c) {
        $this->alternativa_c = $alternativa_c;
    }

    public function setAlternativa_d($alternativa_d) {
        $this->alternativa_d = $alternativa_d;
    }

    public function setAlternativa_e($alternativa_e) {
        $this->alternativa_e = $alternativa_e;
    }

    public function setVerdadeira($verdadeira) {
        $this->verdadeira = $verdadeira;
    }



}

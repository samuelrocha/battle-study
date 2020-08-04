<?php

/**
 * Descrição da OrganizacaoMODEL
 *
 * @author Samuel
 */

namespace app\models;

class OrganizacaoMODEL {
    private $id_organizacao;
    private $nome;
    private $ativado;


    // Metódos Especiais
    
    function __construct() {
        
    }

    public function getId_organizacao() {
        return $this->id_organizacao;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getAtivado() {
        return $this->ativado;
    }

    public function setId_organizacao($id_organizacao) {
        $this->id_organizacao = $id_organizacao;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setAtivado($ativado) {
        $this->ativado = $ativado;
    }

}

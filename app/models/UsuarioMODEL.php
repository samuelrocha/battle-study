<?php

/**
 * Descrição da UsuarioMODEL
 *
 * @author Samuel
 */

namespace app\models;

class UsuarioMODEL {

    private $id_usuario;
    private $email;
    private $usuario;
    private $senha;
    private $nick;
    private $sexo;
    private $descricao;
    private $data_nascimento;
    private $ativado;
    private $ocupacao;
    private $fk_id_tipo_usuario;

    // Metódos especiais

    function __construct() {
        
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getUsuario() {
        return $this->usuario;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function getNick() {
        return $this->nick;
    }

    public function getSexo() {
        return $this->sexo;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function getData_nascimento() {
        return $this->data_nascimento;
    }

    public function getAtivado() {
        return $this->ativado;
    }

    public function getOcupacao() {
        return $this->ocupacao;
    }

    public function getFk_id_tipo_usuario() {
        return $this->fk_id_tipo_usuario;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function setUsuario($usuario) {
        $this->usuario = $usuario;
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function setNick($nick) {
        $this->nick = $nick;
    }

    public function setSexo($sexo) {
        $this->sexo = $sexo;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

    public function setData_nascimento($data_nascimento) {
        $this->data_nascimento = $data_nascimento;
    }

    public function setAtivado($ativado) {
        $this->ativado = $ativado;
    }

    public function setOcupacao($ocupacao) {
        $this->ocupacao = $ocupacao;
    }

    public function setFk_id_tipo_usuario($fk_id_tipo_usuario) {
        $this->fk_id_tipo_usuario = $fk_id_tipo_usuario;
    }

}

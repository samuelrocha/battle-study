<?php

/**
 * Descrição da UsuarioCTR
 *
 * @author Samuel
 */

// Autoload

namespace app\controllers;

require_once '../../vendor/autoload.php';

class UsuarioCTR {

    public function alterarUsuario($id_usuario, $email, $senha, $data_nascimento, $sexo, $descricao, $ocupacao)
    {

        // Cria e insere informações no objeto usuario

        $usuario = new \app\models\UsuarioMODEL();
        $usuario->setId_usuario($id_usuario);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        $usuario->setData_nascimento($data_nascimento);    
        $usuario->setSexo($sexo);
        $usuario->setDescricao($descricao);
        $usuario->setOcupacao($ocupacao);

        // Cria e chama método DAO
        
        $usuario2 = new \app\dao\UsuarioDAO();
        $usuario2->alterarUsuario($usuario);

    }

    public function alterarAtivado($id_usuario, $ativado) 
    {

        // Cria e insere informações no objeto usuario

        $usuario = new \app\models\UsuarioMODEL();
        $usuario->setId_usuario($id_usuario);
        $usuario->setAtivado($ativado);
        
        // Cria e chama método DAO
        
        $usuario2 = new \app\dao\UsuarioDAO();
        $usuario2->alterarAtivado($usuario);
        
    }

    public function cadastrar($email, $nick, $user, $senha) 
    {

        // Cria e insere informações no objeto usuario

        $usuario = new \app\models\UsuarioMODEL();
        $usuario->setEmail($email);
        $usuario->setNick($nick);
        $usuario->setUsuario($user);
        $usuario->setSenha($senha);
        $usuario->setAtivado(true);
        $usuario->setFk_id_tipo_usuario(2);
        
        // Cria e chama método DAO
        
        $usuario2 = new \app\dao\UsuarioDAO();
        $usuario2->cadastrar($usuario);
        
    }

    public function consultarUsuario() 
    {

        // Cria e insere informações no objeto usuario

        // Cria e chama método DAO

        $usuario2 = new \app\dao\UsuarioDAO();
        $consulta = $usuario2->consultarUsuario();
        return $consulta;

    }

    public function carregarUsuario($user) 
    {

        // Cria e insere informações no objeto usuario

        $usuario = new \app\models\UsuarioMODEL();
        $usuario->setUsuario($user);
        
        // Cria e chama método DAO
        
        $usuario2 = new \app\dao\UsuarioDAO();
        $carrega = $usuario2->carregarUsuario($usuario);
        return $carrega;
        
    }

    public function carregarUsuarioId($id_usuario) 
    {

        // Cria e insere informações no objeto usuario

        $usuario = new \app\models\UsuarioMODEL();
        $usuario->setId_usuario($id_usuario);
        
        // Cria e chama método DAO
        
        $usuario2 = new \app\dao\UsuarioDAO();
        $carrega = $usuario2->carregarUsuarioId($usuario);
        return $carrega;
        
    }
    
}

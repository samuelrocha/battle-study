<?php

/**
 * Descrição da UsuarioDAO
 *
 * @author Samuel
 */

// Autoload

namespace app\dao;

require_once '../../vendor/autoload.php';

class UsuarioDAO {

    public function alterarUsuario($usuario)
    {

        // Recebe os parâmetros da CTR

        $id_usuario = $usuario->getId_usuario();
        $email = $usuario->getEmail();
        $senha = $usuario->getSenha();
        $data_nascimento = $usuario->getData_nascimento();    
        $sexo = $usuario->getSexo();   
        $descricao = $usuario->getDescricao();
        $ocupacao = $usuario->getOcupacao();    
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados

        $sql = "UPDATE usuario SET email = :email, senha = :senha,  data_nascimento = :data_nascimento, sexo = :sexo, descricao = :descricao, ocupacao = :ocupacao WHERE id_usuario = :id_usuario";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':data_nascimento', $data_nascimento);
        $stmt->bindParam(':sexo', $sexo);
        $stmt->bindParam(':descricao', $descricao);
        $stmt->bindParam(':ocupacao', $ocupacao);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();

    }

    public function alterarAtivado($usuario) 
    {

        // Recebe os parâmetros da CTR

        $ativado = $usuario->getAtivado();
        $id_usuario = $usuario->getId_usuario();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "UPDATE usuario SET ativado = :ativado WHERE id_usuario = :id_usuario";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':ativado', $ativado);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        
    }

    public function cadastrar($usuario) 
    {

        // Recebe os parâmetros da CTR

        $email = $usuario->getEmail();
        $user = $usuario->getUsuario();
        $nick = $usuario->getNick();
        $senha = $usuario->getSenha();
        $ativado = $usuario->getAtivado();
        $id_tipo_usuario = $usuario->getFk_id_tipo_usuario();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "INSERT INTO usuario (email, nick, usuario, senha, ativado,id_tipo_usuario) VALUES"
        . " (:email,:nick,:user,:senha,:ativado,:id_tipo_usuario)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':nick', $nick);
        $stmt->bindParam(':user', $user);
        $stmt->bindParam(':senha', $senha);
        $stmt->bindParam(':ativado', $ativado);
        $stmt->bindParam(':id_tipo_usuario', $id_tipo_usuario);
        $stmt->execute();
        
    }

    public function consultarUsuario() 
    {

        // Recebe os parâmetros da CTR


        // Cria nova Conexao

        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM usuario";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(\PDO :: FETCH_ASSOC);
        return $dados;
        
    }

    public function carregarUsuario($usuario)
    {

        // Recebe os parâmetros da CTR

        $user = $usuario->getUsuario();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT id_usuario, email, nick, descricao, data_nascimento, senha, ocupacao, sexo FROM usuario"
        . " WHERE usuario = :usuario";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':usuario', $user);
        $stmt->execute(); 
        $dados = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $dados;

    }

    public function carregarUsuarioId($usuario)
    {

        // Recebe os parâmetros da CTR

        $id_usuario = $usuario->getId_usuario();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT id_usuario, email, nick, descricao, data_nascimento, senha, ocupacao, sexo FROM usuario"
        . " WHERE id_usuario = :id_usuario";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute(); 
        $dados = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $dados;

    }
    
}

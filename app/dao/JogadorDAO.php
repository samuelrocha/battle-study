<?php

/**
 * Descrição da JogadorDAO
 *
 * @author Samuel
 */

namespace app\dao;

require_once '../../vendor/autoload.php';

class JogadorDAO {

    public function carregarJogador($jogador)
    {
        
        // Recebe os parâmetros da CTR
        
        $fk_id_usuario = $jogador->getFk_id_usuario();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM jogador WHERE id_usuario = :fk_id_usuario";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':fk_id_usuario',$fk_id_usuario);
        $stmt->execute();
        $dados = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $dados;
        
    }
    
    public function escolherOrganizacao($jogador)
    {
        
        // Recebe os parâmetros da CTR
        
        $id_jogador = $jogador->getId_jogador();
        $fk_id_organizacao = $jogador->getFk_id_organizacao();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "UPDATE jogador SET id_organizacao = :id_organizacao WHERE id_jogador = :id_jogador";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_organizacao', $fk_id_organizacao);
        $stmt->bindParam(':id_jogador', $id_jogador);
        $stmt->execute();
        
    }

    public function gerarJogador($jogador)
    {

        // Recebe os parâmetros da CTR
        
        $fk_id_usuario = $jogador->getFk_id_usuario();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "INSERT INTO jogador (id_usuario) value (:fk_id_usuario)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':fk_id_usuario', $fk_id_usuario);
        $stmt->execute();

    }

    public function carregarOrganizacao($jogador)
    {

        $fk_id_organizacao = $jogador->getFk_id_organizacao();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM organizacao WHERE id_organizacao = :fk_id_organizacao";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':fk_id_organizacao', $fk_id_organizacao);
        $stmt->execute();
        $dados = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $dados;

    }
    
}

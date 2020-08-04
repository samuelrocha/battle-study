<?php

/**
 * Descrição da ClassificacaoDAO
 *
 * @author Samuel
 */

namespace app\dao;

require_once '../../vendor/autoload.php';

class ClassificacaoDAO {
    
    public function consultarClassificacao()
    {
        
        // Recebe os parâmetros da CTR

        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM classificacao ORDER BY vitoria DESC";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $dados;
        
    }

    public function gerarClassificacao($classificacao)
    {

        // Recebe os parâmetros da CTR

        $fk_id_jogador = $classificacao->getFk_id_jogador();
        $vitoria = $classificacao->getVitoria(); 
    
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados

        $sql = "INSERT INTO classificacao (id_jogador, vitoria) value (:id_jogador, :vitoria)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_jogador', $fk_id_jogador);
        $stmt->bindParam(':vitoria', $vitoria);
        $stmt->execute();

    }

    public function atualizar($classificacao)
    {

        // Recebe os parâmetros da CTR

        $id_classificacao = $classificacao->getId_classificacao();
        $posicao = $classificacao->getPosicao(); 

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados

        $sql = "UPDATE classificacao SET posicao = :posicao WHERE id_classificacao = :id_classificacao";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_classificacao', $id_classificacao);
        $stmt->bindParam(':posicao', $posicao);
        $stmt->execute();

    }

    public function carregarClassificacao($classificacao)
    {
        
        // Recebe os parâmetros da CTR

        $fk_id_jogador = $classificacao->getFk_id_jogador();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM classificacao WHERE id_jogador = :id_jogador";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_jogador', $fk_id_jogador);
        $stmt->execute();
        $dados = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $dados;
        
    }

    public function acrescentarVitoria($classificacao)
    {
        
        // Recebe os parâmetros da CTR

        $fk_id_jogador = $classificacao->getFk_id_jogador();
        $vitoria = $classificacao->getVitoria();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "UPDATE classificacao SET vitoria = :vitoria WHERE id_jogador = :id_jogador";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_jogador', $fk_id_jogador);
        $stmt->bindParam(':vitoria', $vitoria);
        $stmt->execute();

    }
    
}

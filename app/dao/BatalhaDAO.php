<?php

/**
 * Descrição da BatalhaDAO
 *
 * @author Samuel
 */

namespace app\dao;

require_once '../../vendor/autoload.php';

class BatalhaDAO {
    
    public function consultarBatalha()
    {

        // Recebe os parâmetros da CTR 
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM batalha";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $batalha = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $batalha;

    }

    public function alterarTempo($batalha)
    {

        // Recebe os parâmetros da CTR
        
        $tempo = $batalha->getTempo();
        $id_batalha = $batalha->getId_batalha();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "UPDATE batalha SET tempo = :tempo WHERE id_batalha = :id_batalha";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':tempo', $tempo);
        $stmt->bindParam(':id_batalha', $id_batalha);
        $stmt->execute();

    }

    public function carregarBatalha($batalha)
    {

        // Recebe os parâmetros da CTR
        
        $id_batalha = $batalha->getId_batalha();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT tempo, id_questao, pontos_termino FROM batalha WHERE id_batalha = :id_batalha";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_batalha', $id_batalha);
        $stmt->execute();
        $tempo = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $tempo;

    }

    public function alterarQuestao($batalha)
    {

        // Recebe os parâmetros da CTR
        
        $id_batalha = $batalha->getId_batalha();
        $fk_id_questao = $batalha->getFk_id_questao();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "UPDATE batalha SET id_questao = :fk_id_questao WHERE id_batalha = :id_batalha";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_batalha', $id_batalha);
        $stmt->bindParam(':fk_id_questao', $fk_id_questao);
        $stmt->execute();

    }

    public function alterarPontos($batalha)
    {

        // Recebe os parâmetros da CTR
        
        $id_batalha = $batalha->getId_batalha();
        $pontos_termino = $batalha->getPontos_termino();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "UPDATE batalha SET pontos_termino = :pontos_termino WHERE id_batalha = :id_batalha";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_batalha', $id_batalha);
        $stmt->bindParam(':pontos_termino', $pontos_termino);
        $stmt->execute();

    }

    public function criarBatalha()
    {

        // Recebe os parâmetros da CTR
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "INSERT INTO batalha () value ()";
        $stmt = $con->prepare($sql);
        $stmt->execute();


    }

}

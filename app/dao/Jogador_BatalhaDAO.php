<?php

/**
 * Descrição da Jogador_BatalhaDAO
 *
 * @author Samuel
 */

namespace app\dao;

require_once '../../vendor/autoload.php';

class Jogador_BatalhaDAO {

    public function entrarBatalha($jogador_batalha) 
    {
        
        // Recebe os parâmetros da CTR
        
        $fk_id_jogador = $jogador_batalha->getFk_id_jogador();
        $fk_id_batalha = $jogador_batalha->getFk_id_batalha();
        $pontos = $jogador_batalha->getPontos();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
      
        // Insere informações no banco de dados
        
        $sql = "INSERT INTO jogador_batalha (id_jogador,id_batalha,pontos) VALUES  (:fk_id_jogador,:fk_id_batalha,:pontos)";
        $stmt = $con->Prepare($sql);
        $stmt->bindParam(':fk_id_jogador', $fk_id_jogador);
        $stmt->bindParam(':fk_id_batalha', $fk_id_batalha);
        $stmt->bindParam(':pontos', $pontos);
        $stmt->execute();
        
    }

    public function sairBatalha($jogador_batalha) 
    {

        // Recebe os parâmetros da CTR
        
        $fk_id_jogador = $jogador_batalha->getFk_id_jogador();
    
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "DELETE FROM jogador_batalha WHERE id_jogador = :fk_id_jogador;";
        $stmt = $con->Prepare($sql);
        $stmt->bindParam(':fk_id_jogador', $fk_id_jogador);
        $stmt->execute();
        
    }

    public function consultarJogadorBatalha()
    {

        // Recebe os parâmetros da CTR
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM jogador_batalha";
        $stmt = $con->Prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $dados;

    }

    public function fimBatalha($jogador_batalha)
    {
 
        // Recebe os parâmetros da CTR
        
        $fk_id_batalha = $jogador_batalha->getFk_id_batalha();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
    
        $sql = "DELETE FROM jogador_batalha WHERE id_batalha = :fk_id_batalha";
        $stmt = $con->Prepare($sql);
        $stmt->bindParam(':fk_id_batalha', $fk_id_batalha);
        $stmt->execute();

    }

    public function totalBatalha($jogador_batalha)
    {

        // Recebe os parâmetros da CTR
        
        $fk_id_batalha = $jogador_batalha->getFk_id_batalha();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
    
        $sql = "SELECT COUNT(*) FROM jogador_batalha WHERE id_batalha = :fk_id_batalha";
        $stmt = $con->Prepare($sql);
        $stmt->bindParam(':fk_id_batalha', $fk_id_batalha);
        $stmt->execute();
        $dados = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $dados;

    }

    public function carregarJogadorBatalha($jogador_batalha)
    {

        // Recebe os parâmetros da CTR
        
        $fk_id_batalha = $jogador_batalha->getFk_id_batalha();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
    
        $sql = "SELECT * FROM jogador_batalha WHERE id_batalha = :fk_id_batalha ORDER BY pontos DESC";
        $stmt = $con->Prepare($sql);
        $stmt->bindParam(':fk_id_batalha', $fk_id_batalha);
        $stmt->execute();
        $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $dados;

    }

    public function pontuar($jogador_batalha)
    {

        // Recebe os parâmetros da CTR
        
        $pontos = $jogador_batalha->getPontos();
        $fk_id_jogador = $jogador_batalha->getFk_id_jogador();
        $resposta = $jogador_batalha->getResposta();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
    
        $sql = "UPDATE jogador_batalha SET pontos = :pontos, resposta = :resposta WHERE id_jogador = :fk_id_jogador";
        $stmt = $con->Prepare($sql);
        $stmt->bindParam(':pontos', $pontos);
        $stmt->bindParam(':fk_id_jogador', $fk_id_jogador);
        $stmt->bindParam(':resposta', $resposta);
        $stmt->execute();

    }

    public function carregarPontos($jogador_batalha)
    {

        // Recebe os parâmetros da CTR
        
        $fk_id_jogador = $jogador_batalha->getFk_id_jogador();

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
    
        $sql = "SELECT pontos FROM jogador_batalha WHERE id_jogador = :fk_id_jogador";
        $stmt = $con->Prepare($sql);
        $stmt->bindParam(':fk_id_jogador', $fk_id_jogador);
        $stmt->execute();
        $dados = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $dados;

    }

    public function requerirQuestao($jogador_batalha) 
    {
        
        // Recebe os parâmetros da CTR
        
        $fk_id_questao = $jogador_batalha->getFk_id_questao();  
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT pergunta, alternativa_a, alternativa_b, alternativa_c, alternativa_d, alternativa_e, verdadeira FROM questao WHERE id_questao = :id_questao";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_questao', $fk_id_questao);
        $stmt->execute();
        $questao = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $questao;
        
    }

    public function responderQuestao($batalha)
    {

        // Recebe os parâmetros da CTR
        
        $verdadeira = $batalha->getVerdadeira();  
        $id_questao = $batalha->getId_questao($id_questao);
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT id_questao FROM questao WHERE verdadeira = :verdadeira AND id_questao = :id_questao";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':verdadeira', $verdadeira);
        $stmt->bindParam(':id_questao', $id_questao);
        $stmt->execute();
        $dados = $stmt->fetchColumn() > 0;
        return $dados;
    }

}

<?php

/**
 * Descrição da QuestaoDAO
 *
 * @author Samuel
 */

namespace app\dao;

require_once '../../vendor/autoload.php';

class QuestaoDAO {

    public function alterarQuestao($questao) 
    {
        
        // Recebe os parâmetros da CTR
        
        $pergunta = $questao->getPergunta();
        $alternativa_a = $questao->getAlternativa_a();
        $alternativa_b = $questao->getAlternativa_b();
        $alternativa_c = $questao->getAlternativa_c();
        $alternativa_d = $questao->getAlternativa_d();
        $alternativa_e = $questao->getAlternativa_e();
        $verdadeira = $questao->getVerdadeira();
        $id_questao = $questao->getId_questao();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "UPDATE questao SET pergunta = :pergunta, alternativa_a = :alternativa_a, "
                . "alternativa_b = :alternativa_b, alternativa_c = :alternativa_c, "
                . "alternativa_d = :alternativa_d, alternativa_e = :alternativa_e, verdadeira = :verdadeira WHERE id_questao = :id_questao";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':pergunta', $pergunta);
        $stmt->bindParam(':alternativa_a', $alternativa_a);
        $stmt->bindParam(':alternativa_b', $alternativa_b);
        $stmt->bindParam(':alternativa_c', $alternativa_c);
        $stmt->bindParam(':alternativa_d', $alternativa_d);
        $stmt->bindParam(':alternativa_e', $alternativa_e);
        $stmt->bindParam(':verdadeira', $verdadeira);
        $stmt->bindParam(':id_questao', $id_questao);
        $stmt->execute();
        
    }

    public function adicionarQuestao($questao) 
    {
        
        // Recebe os parâmetros da CTR
        
        $pergunta = $questao->getPergunta();
        $alternativa_a = $questao->getAlternativa_a();
        $alternativa_b = $questao->getAlternativa_b();
        $alternativa_c = $questao->getAlternativa_c();
        $alternativa_d = $questao->getAlternativa_d();
        $alternativa_e = $questao->getAlternativa_e();
        $verdadeira = $questao->getVerdadeira();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "INSERT INTO questao (pergunta, alternativa_a, alternativa_b, alternativa_c, alternativa_d, alternativa_e, verdadeira) VALUES (:pergunta, :alternativa_a, :alternativa_b, :alternativa_c, :alternativa_d, :alternativa_e, :verdadeira)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':pergunta', $pergunta);
        $stmt->bindParam(':alternativa_a', $alternativa_a);
        $stmt->bindParam(':alternativa_b', $alternativa_b);
        $stmt->bindParam(':alternativa_c', $alternativa_c);
        $stmt->bindParam(':alternativa_d', $alternativa_d);
        $stmt->bindParam(':alternativa_e', $alternativa_e);
        $stmt->bindParam(':verdadeira', $verdadeira);
        $stmt->execute();
        
    }

    public function removerQuestao($questao) 
    {
        
        // Recebe os parâmetros da CTR
        
        $id_questao = $questao->getId_questao();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "DELETE FROM questao WHERE id_questao = :id_questao";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':id_questao', $id_questao);
        $stmt->execute();
        
    }

    public function consultarQuestao() 
    {
        
        // Recebe os parâmetros da CTR

        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM questao";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $dados;
        
    }

}

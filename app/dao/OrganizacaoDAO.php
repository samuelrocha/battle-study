<?php

/**
 * Descrição da OrganizacaoDAO
 *
 * @author Samuel
 */

namespace app\dao;

require_once '../../vendor/autoload.php';

class OrganizacaoDAO {

    public function cadastrar($organizacao) {
        
        // Recebe os parâmetros da CTR
        
        $nome = $organizacao->getNome();
        $ativado = $organizacao->getAtivado();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "INSERT INTO organizacao (nome, ativado) VALUES (:nome,:ativado)";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':ativado', $ativado);
        $stmt->execute();
        
    }

    public function consultarOrganizacao() {
        
        // Recebe os parâmetros da CTR
        
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM organizacao";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(\PDO :: FETCH_ASSOC);
        return $dados;
        
    }

    public function alterarAtivado($organizacao) {
        
        // Recebe os parâmetros da CTR
        
        $ativado = $organizacao->getAtivado();
        $id_organizacao = $organizacao->getId_organizacao();
    
        // Cria nova Conexao
        
        $c  = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "UPDATE organizacao SET ativado = :ativado WHERE id_organizacao = :id_organizacao";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':ativado', $ativado);
        $stmt->bindParam(':id_organizacao', $id_organizacao);
        $stmt->execute();
        
    }

    public function listarAtivados(){

        // Recebe os parâmetros da CTR
        
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
        
        $sql = "SELECT * FROM organizacao WHERE ativado = 1";
        $stmt = $con->prepare($sql);
        $stmt->execute();
        $dados = $stmt->fetchAll(\PDO :: FETCH_ASSOC);
        return $dados;
    }

}

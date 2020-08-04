<?php

/**
 * Descrição da OrganizacaoCTR
 *
 * @author Samuel
 */

namespace app\controllers;

require_once '../../vendor/autoload.php';

class OrganizacaoCTR {

    public function cadastrar($nome, $ativado) 
    {
        
        // Cria e insere informações no objeto batalha
        
        $organizacao = new \app\models\OrganizacaoMODEL();
        $organizacao->setNome($nome);
        $organizacao->setAtivado($ativado);
        
        // Cria e chama método DAO
        
        $organizacao2 = new \app\dao\OrganizacaoDAO();
        $organizacao2->cadastrar($organizacao);
        
    }

    public function consultarOrganizacao() 
    {
        
        // Cria e insere informações no objeto batalha
     
        // Cria e chama método DAO
        
        $organizacao2 = new \app\dao\OrganizacaoDAO();
        $consulta = $organizacao2->consultarOrganizacao();
        return $consulta;
        
    }

    public function alterarAtivado($ativado, $id_organizacao)
    {
        
        // Cria e insere informações no objeto batalha
        
        $organizacao = new \app\models\OrganizacaoMODEL();
        $organizacao->setAtivado($ativado);
        $organizacao->setId_organizacao($id_organizacao);
        
        // Cria e chama método DAO
        
        $organizacao2 = new \app\dao\OrganizacaoDAO();
        $organizacao2 ->alterarAtivado($organizacao);
        
    }

    public function listarAtivados() 
    {

        // Cria e insere informações no objeto batalha
     
        // Cria e chama método DAO
        
        $organizacao2 = new \app\dao\OrganizacaoDAO();
        $consulta = $organizacao2->listarAtivados();
        return $consulta;

    }

}

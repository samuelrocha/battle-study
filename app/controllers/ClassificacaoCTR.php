<?php

/**
 * Descrição da ClassificacaoDAO
 *
 * @author Samuel
 */

namespace app\controllers;

require_once '../../vendor/autoload.php';

class ClassificacaoCTR {
    
    public function consultarClassificacao()
    {
        
        // Cria e insere informações no objeto batalha
        
        // Cria e chama método DAO       
        
        $classificacao2 = new \app\dao\ClassificacaoDAO();
        $consulta = $classificacao2->consultarClassificacao();
        return $consulta;
        
    }

    public function gerarClassificacao($fk_id_jogador)
    {

        // Cria e insere informações no objeto batalha
        
        $classificacao = new \app\models\ClassificacaoMODEL();
        $classificacao->setFk_id_jogador($fk_id_jogador);
        $classificacao->setVitoria(0);

        // Cria e chama método DAO       
        
        $classificacao2 = new \app\dao\ClassificacaoDAO();
        $classificacao2->gerarClassificacao($classificacao);

    }

    public function atualizar($id_classificacao, $posicao)
    {

        // Cria e insere informações no objeto batalha
        
        $classificacao = new \app\models\ClassificacaoMODEL();
        $classificacao->setId_classificacao($id_classificacao);
        $classificacao->setPosicao($posicao);

        // Cria e chama método DAO       
        
        $classificacao2 = new \app\dao\ClassificacaoDAO();
        $classificacao2->atualizar($classificacao);

    }

    public function carregarClassificacao($fk_id_jogador)
    {

        // Cria e insere informações no objeto batalha
        
        $classificacao = new \app\models\ClassificacaoMODEL();
        $classificacao->setFk_id_jogador($fk_id_jogador);

        // Cria e chama método DAO       
        
        $classificacao2 = new \app\dao\ClassificacaoDAO();
        $dados = $classificacao2->carregarClassificacao($classificacao);
        return $dados;
        
    }

    public function acrescentarVitoria($fk_id_jogador, $vitoria)
    {
        
        // Cria e insere informações no objeto batalha
        
        $classificacao = new \app\models\ClassificacaoMODEL();
        $classificacao->setFk_id_jogador($fk_id_jogador);
        $classificacao->setVitoria($vitoria);

        // Cria e chama método DAO       
        
        $classificacao2 = new \app\dao\ClassificacaoDAO();
        $classificacao2->acrescentarVitoria($classificacao);

    }
    
}

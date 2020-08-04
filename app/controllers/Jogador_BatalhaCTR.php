<?php

/**
 * Descrição da Jogador_BatalhaCTR
 *
 * @author Samuel
 */

namespace app\controllers;

require_once '../../vendor/autoload.php';

class Jogador_BatalhaCTR {

    public function entrarBatalha($fk_id_jogador, $fk_id_batalha) 
    {
        
        // Cria e insere informações no objeto batalha
        
        $jogador_batalha = new \app\models\Jogador_BatalhaMODEL();
        $jogador_batalha->setFk_id_jogador($fk_id_jogador);
        $jogador_batalha->setFk_id_batalha($fk_id_batalha);
        $jogador_batalha->setPontos(0);
        
        // Cria e chama método DAO
        
        $jogador_batalha2 = new \app\dao\Jogador_BatalhaDAO();
        $jogador_batalha2->entrarBatalha($jogador_batalha);
        
    }

    public function sairBatalha($fk_id_jogador) 
    {
        
        // Cria e insere informações no objeto batalha
        
        $jogador_batalha = new \app\models\Jogador_BatalhaMODEL();
        $jogador_batalha->setFk_id_jogador($fk_id_jogador);
        
        // Cria e chama método DAO
        
        $jogador_batalha2 = new \app\dao\Jogador_BatalhaDAO();
        $jogador_batalha2->sairBatalha($jogador_batalha);

    }

    public function consultarJogadorBatalha()
    {

        // Cria e insere informações no objeto batalha
        
        // Cria e chama método DAO
        
        $jogador_batalha2 = new \app\dao\Jogador_BatalhaDAO();
        $dados = $jogador_batalha2->consultarJogadorBatalha();
        return $dados;

    }

    public function fimBatalha($fk_id_batalha)
    {

        // Cria e insere informações no objeto batalha
        
        $jogador_batalha = new \app\models\Jogador_BatalhaMODEL();
        $jogador_batalha->setFk_id_batalha($fk_id_batalha);
        
        
        // Cria e chama método DAO
        
        $jogador_batalha2 = new \app\dao\Jogador_BatalhaDAO();
        $jogador_batalha2->fimBatalha($jogador_batalha);

    }

    public function totalBatalha($fk_id_batalha)
    {

        // Cria e insere informações no objeto batalha
        
        $jogador_batalha = new \app\models\Jogador_BatalhaMODEL();
        $jogador_batalha->setFk_id_batalha($fk_id_batalha);
        
        
        // Cria e chama método DAO
        
        $jogador_batalha2 = new \app\dao\Jogador_BatalhaDAO();
        $dados = $jogador_batalha2->totalBatalha($jogador_batalha);
        return $dados;

    }

    public function carregarJogadorBatalha($fk_id_batalha)
    {

        // Cria e insere informações no objeto batalha
        
        $jogador_batalha = new \app\models\Jogador_BatalhaMODEL();
        $jogador_batalha->setFk_id_batalha($fk_id_batalha);
        
        
        // Cria e chama método DAO
        
        $jogador_batalha2 = new \app\dao\Jogador_BatalhaDAO();
        $dados = $jogador_batalha2->carregarJogadorBatalha($jogador_batalha);
        return $dados;

    }

    public function pontuar($pontos, $fk_id_jogador, $resposta)
    {

        // Cria e insere informações no objeto jogador batalha
        
        $jogador_batalha = new \app\models\Jogador_BatalhaMODEL();
        $jogador_batalha->setPontos($pontos);
        $jogador_batalha->setFk_id_jogador($fk_id_jogador);
        $jogador_batalha->setResposta($resposta);
        
        // Cria e chama método DAO
        
        $jogador_batalha2 = new \app\dao\Jogador_BatalhaDAO();
        $jogador_batalha2->pontuar($jogador_batalha);

    }

    public function carregarPontos($fk_id_jogador)
    {

        // Cria e insere informações no objeto jogador batalha
        
        $jogador_batalha = new \app\models\Jogador_BatalhaMODEL();
        $jogador_batalha->setFk_id_jogador($fk_id_jogador);
        
        
        // Cria e chama método DAO
        
        $jogador_batalha2 = new \app\dao\Jogador_BatalhaDAO();
        $dados = $jogador_batalha2->carregarPontos($jogador_batalha);
        return $dados;

    }

    public function requerirQuestao($id_questao) 
    {  
        
        // Cria e insere informações no objeto batalha
        
        $batalha = new \app\models\BatalhaMODEL();
        $batalha->setFk_id_questao($id_questao);
        
        // Cria e chama método DAO
        
        $jogador_batalha = new \app\dao\Jogador_BatalhaDAO();
        $questao = $jogador_batalha->requerirQuestao($batalha);
        return $questao;
        
    }

    public function responderQuestao($id_questao, $verdadeira)
    {

        // Cria e insere informações no objeto batalha
        
        $questao = new \app\models\QuestaoMODEL();
        $questao->setVerdadeira($verdadeira);
        $questao->setId_questao($id_questao);
        
        // Cria e chama método DAO
        
        $jogador_batalha = new \app\dao\Jogador_BatalhaDAO();
        $resultado = $jogador_batalha->responderQuestao($questao);
        return $resultado;
        
    }

}

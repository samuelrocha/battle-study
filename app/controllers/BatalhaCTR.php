<?php

/**
 * Descrição da BatalhaCTR
 *
 * @author Samuel
 */

namespace app\controllers;

require_once '../../vendor/autoload.php';

class BatalhaCTR {

    public function consultarBatalha()
    {

        // Cria e insere informações no objeto batalha
        
        // Cria e chama método DAO
        
        $batalha2 = new \app\dao\BatalhaDAO();
        $dados = $batalha2->consultarBatalha();
        return $dados;

    }

    public function alterarTempo($tempo, $id_batalha)
    {

        // Cria e insere informações no objeto batalha
        
        $batalha = new \app\models\BatalhaMODEL();
        $batalha->setTempo($tempo);
        $batalha->setId_batalha($id_batalha);
        
        // Cria e chama método DAO
        
        $batalha2 = new \app\dao\BatalhaDAO();
        $batalha2->alterarTempo($batalha);

    }

    public function carregarBatalha($id_batalha)
    {

        // Cria e insere informações no objeto batalha
        
        $batalha = new \app\models\BatalhaMODEL();
        $batalha->setId_batalha($id_batalha);
        
        // Cria e chama método DAO
        
        $batalha2 = new \app\dao\BatalhaDAO();
        $tempo = $batalha2->carregarBatalha($batalha);
        return $tempo;

    }

    public function alterarQuestao($id_batalha, $fk_id_questao)
    {

        // Cria e insere informações no objeto batalha
        
        $batalha = new \app\models\BatalhaMODEL();
        $batalha->setId_batalha($id_batalha);
        $batalha->setFk_id_questao($fk_id_questao);
        
        // Cria e chama método DAO
        
        $batalha2 = new \app\dao\BatalhaDAO();
        $batalha2->alterarQuestao($batalha);

    }

    public function alterarPontos($id_batalha, $pontos_termino)
    {

        // Cria e insere informações no objeto batalha
        
        $batalha = new \app\models\BatalhaMODEL();
        $batalha->setId_batalha($id_batalha);
        $batalha->setPontos_termino($pontos_termino);
        
        // Cria e chama método DAO
        
        $batalha2 = new \app\dao\BatalhaDAO();
        $dados = $batalha2->alterarPontos($batalha);
        return $dados;

    }

    public function criarBatalha()
    {

        // Cria e insere informações no objeto batalha

        // Cria e chama método DAO
        
        $batalha = new \app\dao\BatalhaDAO();
        $batalha->criarBatalha();

    }

}

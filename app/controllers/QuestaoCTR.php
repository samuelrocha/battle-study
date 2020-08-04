<?php

/**
 * Descrição da QuestaoCTR
 *
 * @author Samuel
 */

namespace app\controllers;

require_once '../../vendor/autoload.php';

class QuestaoCTR {

    public function alterarQuestao($pergunta, $alternativa_a, $alternativa_b, $alternativa_c,
            $alternativa_d, $alternativa_e, $verdadeira, $id_questao)
    {
        
        // Cria e insere informações no objeto questao
        
        $questao = new \app\models\QuestaoMODEL();
        $questao->setPergunta($pergunta);
        $questao->setAlternativa_a($alternativa_a);
        $questao->setAlternativa_b($alternativa_b);
        $questao->setAlternativa_c($alternativa_c);
        $questao->setAlternativa_d($alternativa_d);
        $questao->setAlternativa_e($alternativa_e);
        $questao->setVerdadeira($verdadeira);
        $questao->setId_questao($id_questao);

        // Cria e chama método DAO
        
        $questao2 = new \app\dao\QuestaoDAO();
        $questao2->alterarQuestao($questao);
        
    }

    public function adicionarQuestao($pergunta, $alternativa_a, $alternativa_b, $alternativa_c, $alternativa_d, $alternativa_e, $verdadeira) 
    {
        
        // Cria e insere informações no objeto questao
        
        $questao = new \app\models\QuestaoMODEL();
        $questao->setPergunta($pergunta);
        $questao->setAlternativa_a($alternativa_a);
        $questao->setAlternativa_b($alternativa_b);
        $questao->setAlternativa_c($alternativa_c);
        $questao->setAlternativa_d($alternativa_d);
        $questao->setAlternativa_e($alternativa_e);
        $questao->setVerdadeira($verdadeira);

        // Cria e chama método DAO
        
        $questao2 = new \app\dao\QuestaoDAO();
        $questao2->adicionarQuestao($questao);  
        
    }

    public function removerQuestao($id_questao) 
    {
        
        // Cria e insere informações no objeto questao
        
        $questao = new \app\models\QuestaoMODEL();
        $questao->setId_questao($id_questao);
        
        // Cria e chama método DAO
        
        $questao2 = new \app\dao\QuestaoDAO();
        $questao2->removerQuestao($questao);

    }

    public function consultarQuestao() 
    {
        
        // Cria e insere informações no objeto questao

        // Cria e chama método DAO
        
        $questao = new \app\dao\QuestaoDAO();
        $consulta = $questao->consultarQuestao();
        return $consulta;
        
    }

}

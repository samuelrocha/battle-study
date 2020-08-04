<?php

/**
 * Descrição da JogadorDAO
 *
 * @author Samuel
 */

namespace app\controllers;

require_once '../../vendor/autoload.php';

class JogadorCTR {

    public function carregarJogador($fk_id_usuario) 
    {
        
        // Cria e insere informações no objeto jogador
        
        $jogador = new \app\models\JogadorMODEL();
        $jogador->setFk_id_usuario($fk_id_usuario);
        
        // Cria e chama método DAO

        $jogador2 = new \app\dao\JogadorDAO();
        $carrega = $jogador2->carregarJogador($jogador);
        return $carrega;
      
    }

    public function escolherOrganizacao($id_jogador, $fk_id_organizacao) 
    {
        
        // Cria e insere informações no objeto jogador
        
        $jogador = new \app\models\JogadorMODEL();
        $jogador->setId_jogador($id_jogador);
        $jogador->setFk_id_organizacao($fk_id_organizacao);
     
        // Cria e chama método DAO
        
        $jogador2 = new \app\dao\JogadorDAO();
        $carrega = $jogador2->escolherOrganizacao($jogador);
        
    }

    public function gerarJogador($fk_id_usuario)
    {

        // Cria e insere informações no objeto jogador
        
        $jogador = new \app\models\JogadorMODEL();
        $jogador->setFk_id_usuario($fk_id_usuario);
        
        // Cria e chama método DAO
        
        $jogador2 = new \app\dao\JogadorDAO();
        $jogador2->gerarJogador($jogador);

    }

    public function carregarOrganizacao($fk_id_organizacao)
    {

        // Cria e insere informações no objeto jogador
        
        $jogador = new \app\models\JogadorMODEL();
        $jogador->setFk_id_organizacao($fk_id_organizacao);
        
        // Cria e chama método DAO
        
        $jogador2 = new \app\dao\JogadorDAO();
        $organizacao = $jogador2->carregarOrganizacao($jogador);
        return $organizacao;

    }

}

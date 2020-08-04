<?php

/**
 * Descrição da LoginCTR
 *
 * @author Samuel
 */

namespace app\controllers;

require_once '../../vendor/autoload.php';

class LoginCTR {

    public function logar($user, $senha) 
    {

        // Cria e insere informações no objeto batalha

        $login = new \app\models\LoginMODEL();
        $login->setUsuario($user);
        $login->setSenha($senha);

        // Cria e chama método DAO

        $login2 = new \app\dao\LoginDAO();
        $tipo = $login2->logar($login);
        return $tipo;
        
    }

    public function deslogar() 
    {

    }

    public function verificar() 
    {
        
    }

}

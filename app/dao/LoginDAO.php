<?php

/**
 * Descrição da LoginDAO
 *
 * @author Samuel
 */

namespace app\dao;

require_once '../../vendor/autoload.php';

class LoginDAO {

    public function logar($login) 
    {
        
        // Recebe os parâmetros da CTR
        
        $user = $login->getUsuario();
        $senha = $login->getSenha();
        
        // Cria nova Conexao
        
        $c = new ConexaoDAO();
        $con = $c->getConexao();
        
        // Insere informações no banco de dados
     
       $sql = "SELECT id_tipo_usuario FROM usuario WHERE usuario = :user AND senha = :senha AND ativado = 1";
        $stmt = $con->prepare($sql);
        $stmt->bindParam(':user',$user);
        $stmt->bindParam(':senha',$senha);
        $stmt->execute();
        $tipo = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $tipo;
           
    }

    public function deslogar() 
    {
        
    }

    public function verificar($login) 
    {
        
        
    }

}

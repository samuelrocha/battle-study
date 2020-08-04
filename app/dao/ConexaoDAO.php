<?php

/**
 * Descrição da ConexaoDAO
 *
 * @author Samuel
 */

namespace app\dao;


class ConexaoDAO {

    public function getConexao() 
    {
        $host = 'mysql:host=localhost:3306;dbname=battlestudy;charset=utf8';
        $usuario = 'samuel';
        $senhaBD = '';

        try {
            $conexao = new \PDO($host, $usuario, $senhaBD);
            $conexao->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $conexao->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);
        } catch (PDOException $ex) {
            echo 'Erro ' . $ex->getMessage();
        }
        return $conexao;
    }

}

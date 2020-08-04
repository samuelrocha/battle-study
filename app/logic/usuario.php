<?php

require_once '../../vendor/autoload.php';

$id_usuario = isset($_POST['id_usuario']) ? $_POST['id_usuario'] : null;
$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$nick = isset($_POST['nick']) ? $_POST['nick'] : null;
$email = isset($_POST['email']) ? $_POST['email'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$nsenha = isset($_POST['nsenha']) ? $_POST['nsenha'] : null;
$con_senha = isset($_POST['con_senha']) ? $_POST['con_senha'] : null;
$sexo = isset($_POST['sexo']) ? $_POST['sexo'] : null;
$descricao = isset($_POST['descricao']) ? $_POST['descricao'] : null;
$ocupacao = isset($_POST['ocupacao']) ? $_POST['ocupacao'] : null;
$data_nascimento = isset($_POST['data_nascimento']) ? $_POST['data_nascimento'] : null;
$ativado = isset($_POST['ativado']) ? $_POST['ativado'] : null;
$fk_id_tipo_usuario = isset($_POST['fk_id_tipo_usuario']) ? $_POST['fk_id_tipo_usuario'] : null;
$botao = isset($_POST['botao']) ? $_POST['botao'] : null;

// Executa ação de acordo com o botao clicado

if($botao == "Cadastrar"){

    session_start();

    // Verifica se senha são iguais

    if ($senha === $con_senha && $senha != null) {

        $usuarioCTR = new \app\controllers\UsuarioCTR();
        $jogadorCTR = new \app\controllers\JogadorCTR();

        $consulta = $usuarioCTR->consultarUsuario();

        $verificar = true;
        $senha = md5($senha);

        foreach ($consulta as $key => $value) {
            if($consulta[$key]['usuario'] == $usuario){
                $verificar = false;
                $_SESSION['aviso'] = 'Usuário já existe';
            }elseif($consulta[$key]['email'] == $email){
                $verificar = false;
                $_SESSION['aviso'] = 'E-mail já existe';
            }elseif ($consulta[$key]['nick'] == $nick) {
                $verificar = false;
                $_SESSION['aviso'] = 'Nickname já existe';
            }
        }

        if($verificar){

        // Envia informações para CTR usuario e login

            $usuarioCTR->cadastrar($email, $nick, $usuario, $senha);
            $loginCTR = new app\controllers\LoginCTR();
            $tipo = $loginCTR->logar($usuario, $senha);

        // Retorna se a conta foi criada

            $perfil = $usuarioCTR->carregarUsuario($usuario);
            $id_usuario = $perfil['id_usuario'];


            $jogadorCTR->gerarJogador($id_usuario);

            $jogador = $jogadorCTR->carregarJogador($id_usuario);
            $id_jogador = $jogador['id_jogador'];

            $classificacaoCTR = new \app\controllers\ClassificacaoCTR();
            $classificacaoCTR->gerarClassificacao($id_jogador);

            $_SESSION['usuario'] = $usuario;
            $_SESSION['logado'] = 1;
            header("Location: ../views/home.php");
            exit;

        }else{

            header("Location: ../views/cadastro.php");
            exit;

        }

    } else {

        $_SESSION['aviso'] = 'As senhas não coincidem';
        header("Location: ../views/cadastro.php");
        exit;

    }


    


}elseif ($botao == "Salvar") {

    session_start();

    $usuario = new \app\controllers\UsuarioCTR();
    $perfil = $usuario->carregarUsuario($_SESSION['usuario']);
    $id_usuario = $perfil['id_usuario'];

        // Faz o tratamento da data

    $separada = explode(" ",$data_nascimento);
    $separada[1] = substr($separada[1], 0, -1);
    $data = $separada[2]."-".$separada[0]."-".$separada[1];
    $data_nascimento = date("Y-m-d",strtotime($data));

        // condições para quando não mudar a senha e para quando mudar a senha

    if(empty($nsenha) && empty($con_enha) && empty($senha)){

        $senha = $perfil['senha'];
        $usuario->alterarUsuario($id_usuario, $email, $senha, $data_nascimento, $sexo, $descricao, $ocupacao);

        header("Location: ../views/perfil.php");
        exit;

    }else{

        $senha = md5($senha);
        if ($nsenha === $con_senha && $senha === $perfil['senha'] && $nsenha != null) {

            $nsenha = md5($nsenha);
            $usuario->alterarUsuario($id_usuario, $email, $nsenha, $data_nascimento, $sexo, $descricao, $ocupacao);
            header("Location: ../views/perfil.php");
            exit;

        } else {

            if ($senha != $perfil['senha']) {

                $_SESSION['aviso'] = 'Senha Atual Incorreta';
                header("Location: ../views/configuracoes.php");
                exit;

            }else{

                $_SESSION['aviso'] = 'As senhas não coincidem';
                header("Location: ../views/configuracoes.php");
                exit;

            }
            

        }               

    }        

}elseif ($botao == "Editar") {

    session_start();

    $usuarioCTR = new \app\controllers\UsuarioCTR();

    // Trata informações do select

    if($ativado == '1'){
        $ativado = 1;
    }else{
        $ativado = 0;

    }

    $consulta = $usuarioCTR->consultarUsuario();

    $verificar = false;

    foreach ($consulta as $key => $value) {
        if($consulta[$key]['id_usuario'] == $id_usuario){
            $verificar = true;
        }
    }


    if ($verificar == true) {

        // Envia informações para CTR usuario

        $usuarioCTR->alterarAtivado($id_usuario,$ativado);

        $_SESSION['aviso'] = 'Usuário alterado com sucesso';
        header("Location: ../views/editar_usuario.php");
        exit;        

    }else{

        $_SESSION['aviso'] = 'Usuário não encontrado';
        header("Location: ../views/editar_usuario.php");
        exit;    

    }


}else{

    header("Location: ../views/desenvolvedores.php");
    exit;

}

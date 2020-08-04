<?php

require_once '../../vendor/autoload.php';

// Recebe os valores

$usuario = isset($_POST['usuario']) ? $_POST['usuario'] : null;
$senha = isset($_POST['senha']) ? $_POST['senha'] : null;
$lembrasenha = isset($_POST['lembrarsenha']) ? $_POST['lembrarsenha'] : null;
$botao = isset($_POST['botao']) ? $_POST['botao'] : null;

// Executa ação de acordo com o botao clicado

if($botao == "Entrar"){

	session_start();

	$senha = md5($senha);
	$usuarioCTR = new app\controllers\LoginCTR();
    $tipo = $usuarioCTR->logar($usuario, $senha);

    // Verfica se a conta é adm ou jogador e loga
 	
    if($tipo['id_tipo_usuario'] == 1){
    	
    	if($lembrasenha == 'on'){
    		$_SESSION['cookie'] = 'on';
    	}

    	$_SESSION['usuario'] = $usuario;
	    $_SESSION['logado'] = 1;
	    $_SESSION['adm'] = 1;
	    header("Location: ../views/admin.php");
	    exit; 

    }elseif ($tipo['id_tipo_usuario'] == 2) {

    	
    	if($lembrasenha == 'on'){
    		$_SESSION['cookie'] = 'on';
    	}
    	

	    $_SESSION['usuario'] = $usuario;
	    $_SESSION['logado'] = 1;
	    header("Location: ../views/home.php");
	    exit;

    }

    $_SESSION['aviso'] = 'Usuário ou senha incorretos';
    header("Location: ../views/login.php");
	exit;

}elseif($botao == "Sair"){

	// Usuario desloga

	session_start();
	$_SESSION['id_usuario'] = null;
	$_SESSION['usuario'] = null;
	$_SESSION['logado'] = 0;
	$_SESSION['adm'] = 0;
	header("Location: ../views/login.php");
	exit;

}else{

	header("Location: ../views/desenvolvedores.php");
	exit;

}

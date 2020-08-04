<?php

require_once '../../vendor/autoload.php';

// Recebe os valores do formulario questao

$pergunta = isset($_POST['pergunta'])?$_POST['pergunta']:null;
$alternativa_a = isset($_POST['alternativa_a'])?$_POST['alternativa_a']:null;
$alternativa_b = isset($_POST['alternativa_b'])?$_POST['alternativa_b']:null;
$alternativa_c = isset($_POST['alternativa_c'])?$_POST['alternativa_c']:null;
$alternativa_d = isset($_POST['alternativa_d'])?$_POST['alternativa_d']:null;
$alternativa_e = isset($_POST['alternativa_e'])?$_POST['alternativa_e']:null;
$verdadeira = isset($_POST['verdadeira'])?$_POST['verdadeira']:null;
$id_questao = isset($_POST['id_questao'])?$_POST['id_questao']:null;
$botao = isset($_POST['botao'])?$_POST['botao']: 'Remover';

// Envia informações para o banco

if($botao == "Cadastrar"){


	session_start();

	$questaoCTR = new \app\controllers\QuestaoCTR();

	$questao = $questaoCTR->consultarQuestao();

	$verificar = true;

	foreach ($questao as $key => $value) {
		if($questao[$key]['pergunta'] == $pergunta){
			$verificar = false;
		}
	}

	if($verificar == true){
		$questaoCTR->adicionarQuestao($pergunta, $alternativa_a, $alternativa_b, $alternativa_c, $alternativa_d, $alternativa_e, $verdadeira);

		$_SESSION['aviso'] = "A questão foi inserida";
		header("Location: ../views/cadastro_questao.php");
		exit;

	}else{

		$_SESSION['aviso'] = "A pergunta já foi cadastrada";
		header("Location: ../views/cadastro_questao.php");
		exit;

	}

}elseif ($botao == "Editar") {

	session_start();

	$questaoCTR = new \app\controllers\QuestaoCTR();

	$consulta = $questaoCTR->consultarQuestao();

	$verificar = false;

	foreach ($consulta as $key => $value) {
		if($consulta[$key]['id_questao'] == 1){
			$verificar = true;
		}
	}

	if($verificar){

		$questaoCTR->alterarQuestao($pergunta, $alternativa_a, $alternativa_b, $alternativa_c,
			$alternativa_d, $alternativa_e, $verdadeira, $id_questao);

		$_SESSION['aviso'] = 'Questão alterada com sucesso';
		header("Location: ../views/editar_questao.php");
		exit;

	}else{

		$_SESSION['aviso'] = 'Questão não encontrada';
		header("Location: ../views/editar_questao.php");
		exit;

	}

	
	
}elseif ($botao == "Remover") {

	session_start();
	
	$questaoCTR = new \app\controllers\QuestaoCTR();
	

	$consulta = $questaoCTR->consultarQuestao();

	$verificar = false;

	foreach ($consulta as $key => $value) {
		if($consulta[$key]['id_questao'] == $id_questao){
			$verificar = true;
		}
	}

	if($verificar){

		$questaoCTR->removerQuestao($id_questao);
		$_SESSION['aviso'] = "Questão removida com sucesso";
		header("Location: ../views/remover_questao.php");
		exit;

	}else{

		$_SESSION['aviso'] = "Questão não encontrada";
		header("Location: ../views/remover_questao.php");
		exit;

	}
	

}else{

	header("Location: ../views/desenvolvedores.php");
	exit;
}


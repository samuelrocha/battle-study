<?php 

require_once '../../vendor/autoload.php';

// Recebe os valores do formulario cadastro

$nome = isset($_POST['nome']) ? $_POST['nome']:null;
$ativado = isset($_POST['ativado']) ? $_POST['ativado']:null;
$id_organizacao = isset($_POST['id_organizacao']) ? $_POST['id_organizacao']:null;
$botao = isset($_POST['botao']) ? $_POST['botao'] : null;

// Executa ação de acordo com o botao clicado

if($botao == "Cadastrar"){

	session_start();

	// Envia informações para CTR Organizacao

	$organizacao = new app\controllers\OrganizacaoCTR();
	$organizacao->cadastrar($nome,1);

	$_SESSION['aviso'] = "A organização foi inserida";
	header("Location: ../views/cadastro_organizacao.php");
	exit;

}elseif($botao == "Editar") {
	
	session_start();

	$organizacaoCTR = new app\controllers\OrganizacaoCTR();

	// Trata informações do select

	if($ativado == '1'){
		$ativado = 1;
	}else{
		$ativado = 0;
	}

	$consulta = $organizacaoCTR->consultarOrganizacao();

	$verificar = false;

	foreach ($consulta as $key => $value) {
		if($consulta[$key]['id_organizacao'] == $id_organizacao){
			$verificar = true;
		}
	}

	if ($verificar) {
		
		// Envia informações para CTR Organizacao

		$organizacaoCTR->alterarAtivado($ativado,$id_organizacao);

		$_SESSION['aviso'] = 'Organização alterada com sucesso';
		header("Location: ../views/editar_organizacao.php");
		exit;

	}else{

		$_SESSION['aviso'] = 'Organização não encontrada';
        header("Location: ../views/editar_organizacao.php");
        exit;    

	}

	

}else{

	header("Location: ../views/desenvolvedores.php");
	exit;

}



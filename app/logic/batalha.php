<?php

require_once '../../vendor/autoload.php';

$botao = isset($_POST['botao']) ? $_POST['botao'] : null;

if($botao == 'alterarTempo'){

	session_start();
	
	$batalhaCTR = new app\controllers\BatalhaCTR();
	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();

	$batalha = $batalhaCTR->carregarBatalha($_SESSION['id_batalha']);
	$tempo = $batalha['tempo'];
	$jogadorBatalha = $jogador_batalhaCTR->carregarJogadorBatalha($_SESSION['id_batalha']);
	$id_jogadorHost = $jogadorBatalha[0]['id_jogador'];

	// Verfica se o usuario é o primeiro jogador

	if($id_jogadorHost == $_SESSION['id_jogador']){
		if($tempo == -8){
			$ntempo = 90;
		}else{
			$ntempo = $tempo - 1;
		}	
		$batalhaCTR->alterarTempo($ntempo, $_SESSION['id_batalha']);
	}
	
}elseif($botao == 'carregarTempo'){

	session_start();

	$batalhaCTR = new app\controllers\BatalhaCTR();

	$batalha = $batalhaCTR->carregarBatalha($_SESSION['id_batalha']);
	$tempo = $batalha['tempo'];

	if($tempo >= 60){
		$tempo2 = $tempo - 60;
		if($tempo2 < 10){
			$tempo2 = '01:0'.$tempo2;
		}else{
			$tempo2 = '01:'.$tempo2;
		}
	}elseif (strlen($tempo) == 2 && $tempo > 0) {
		$tempo2 = '00:'.$tempo;
	}elseif($tempo >= 0){
		$tempo2 = '00:0'.$tempo;
	}else{
		$tempo2 = '00:00';
	}

	$controlador['tempo'] = $tempo;
	$controlador['exibir'] = $tempo2; 

	$controlador2 = json_encode($controlador);

	echo $controlador2;

}else{

	header("Location: ../views/desenvolvedores.php");
	exit;

}

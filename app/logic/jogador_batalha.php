<?php 

require_once '../../vendor/autoload.php';

$resposta = isset($_POST['resposta']) ? $_POST['resposta'] : null;
$botao = isset($_POST['botao']) ? $_POST['botao'] : null;

if($botao == "sortear"){

	// Quando a questão é sorteada (AJAX)

	session_start();

	// Processo para randomizar a pergunta que virá 

	$questaoCTR = new app\controllers\QuestaoCTR();
	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();
	$batalhaCTR = new app\controllers\BatalhaCTR();

	$questao = $questaoCTR->consultarQuestao();


	foreach ($questao as $key => $chave) {
		$contador = $questao[$key]['id_questao'];
	}

	$jogadorBatalha = $jogador_batalhaCTR->carregarJogadorBatalha($_SESSION['id_batalha']);
	$id_jogadorHost = $jogadorBatalha[0]['id_jogador'];

	$repetir = null;

	while ($repetir == null || $id_questao == $_SESSION['id_questao']) {

		$id_questao = rand(1, $contador);
		$repetir = $jogador_batalhaCTR->requerirQuestao($id_questao);

	}

	$_SESSION['id_questao'] = $id_questao;

	// Verfica se o usuario é o primeiro jogador

	if($id_jogadorHost == $_SESSION['id_jogador']){
		$batalhaCTR->alterarQuestao($_SESSION['id_batalha'], $_SESSION['id_questao']);
	}

}elseif ($botao == 'carregarJogadores') {
	
	// Atualiza os jogadores exibidos

	session_start();

	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();
	$jogadorCTR = new app\controllers\JogadorCTR();
	$usuarioCTR = new app\controllers\UsuarioCTR();

	$jogadores = $jogador_batalhaCTR->carregarJogadorBatalha($_SESSION['id_batalha']);
	$total = $jogador_batalhaCTR->totalBatalha($_SESSION['id_batalha']);
	$count = $total['COUNT(*)'];
	$pontos = $jogador_batalhaCTR->carregarPontos($_SESSION['id_jogador']);


	foreach ($jogadores as $key => $value) {
		$jogador = $jogadorCTR->carregarJogador($jogadores[$key]['id_jogador']);
		$usuario = $usuarioCTR->carregarUsuarioId($jogador['id_usuario']);
		if($jogador['id_organizacao'] == 1){
			$jogadores2[$key]['organizacao'] = 'Atenas';
		}else{
			$jogadores2[$key]['organizacao'] = 'Esparta';
		}
		$jogadores2[$key]['nick'] = $usuario['nick'];
		$jogadores2[$key]['pontos'] = $jogadores[$key]['pontos'];
		$jogadores2[$key]['pontos2'] = $pontos['pontos'];
		$jogadores2[$key]['total'] = $count;
	}

	

	$jogadores2 = json_encode($jogadores2);
	echo $jogadores2;

}


elseif ($botao == 'carregarPontos') {

	session_start();

	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();
	$pontos = $jogador_batalhaCTR->carregarPontos($_SESSION['id_jogador']);

	$pontos = json_encode($pontos);
	echo $pontos;

}elseif ($botao == 'requerir') {
	
	// Quando usuario requere uma questão (AJAX)

	session_start();

	$batalhaCTR = new app\controllers\BatalhaCTR();
	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();

	// Carrega o id da pergunta

	$batalha = $batalhaCTR->carregarBatalha($_SESSION['id_batalha']);
	$id_questao = $batalha['id_questao'];

	// Carrega a pergunta

	$questao = $jogador_batalhaCTR->requerirQuestao($id_questao);

	// Escreve as perguntas na tela da batalha

	$questao2['pergunta'] = $questao['pergunta'];
	$questao2['alternativa_a'] = $questao['alternativa_a'];
	$questao2['alternativa_b'] = $questao['alternativa_b'];
	$questao2['alternativa_c'] = $questao['alternativa_c'];
	$questao2['alternativa_d'] = $questao['alternativa_d'];
	$questao2['alternativa_e'] = $questao['alternativa_e'];

	// 

	$pontos_total = $jogador_batalhaCTR->carregarPontos($_SESSION['id_jogador']);
	$pontos = $pontos_total['pontos'];
	$jogador_batalhaCTR->pontuar($pontos,$_SESSION['id_jogador'],0);

	// Quando requere questão o bloqueio de responder é liberado

	$_SESSION['block'] = false;

	$questao2 = json_encode($questao2);

	echo $questao2;

	

}elseif($botao == 'responder'){

	// Quando usuario responde uma questão (AJAX)

	session_start();

	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();
	$batalhaCTR = new app\controllers\BatalhaCTR();
	$jogadorCTR = new app\controllers\JogadorCTR();
	$usuarioCTR = new app\controllers\UsuarioCTR();

	// Carrega id da questao

	$batalha = $batalhaCTR->carregarBatalha($_SESSION['id_batalha']);
	$id_questao = $batalha['id_questao'];

	// Pega a alternativa verdadeira

	$batalha = $jogador_batalhaCTR->requerirQuestao($id_questao);
	$verdadeira = $batalha['verdadeira'];

	$pontos_total = $jogador_batalhaCTR->carregarPontos($_SESSION['id_jogador']);
	$pontos = $pontos_total['pontos'];
	if($pontos == null){
		$pontos = 0;
	}

	if($_SESSION['block'] == false){

		if($verdadeira == $resposta){
			$pontos += 10;		
			$jogador_batalhaCTR->pontuar($pontos,$_SESSION['id_jogador'],1);
			$cor = 'verde';
		}else{
			$jogador_batalhaCTR->pontuar($pontos,$_SESSION['id_jogador'],1);
			$cor = 'vermelho';
		}

		$jogador_batalha = $jogador_batalhaCTR->carregarJogadorBatalha($_SESSION['id_batalha']);
		$contador = 0;
		$total = $jogador_batalhaCTR->totalBatalha($_SESSION['id_batalha']);
		$total_jogadores = $total['COUNT(*)'];

		foreach ($jogador_batalha as $key => $value) {
			if($jogador_batalha[$key]['resposta'] == 1){
				$contador += 1;

				if($contador == $total_jogadores){
					$batalhaCTR->alterarTempo(0, $_SESSION['id_batalha']);
				}
			}
		}

		// Atualiza lista de jogadores

		$jogadores = $jogador_batalhaCTR->carregarJogadorBatalha($_SESSION['id_batalha']);
		$total = $jogador_batalhaCTR->totalBatalha($_SESSION['id_batalha']);
		$count = $total['COUNT(*)'];


		foreach ($jogadores as $key => $value) {
			$jogador = $jogadorCTR->carregarJogador($jogadores[$key]['id_jogador']);
			$usuario = $usuarioCTR->carregarUsuarioId($jogador['id_usuario']);
			if($jogador['id_organizacao'] == 1){
				$jogadores2[$key]['organizacao'] = 'Atenas';
			}else{
				$jogadores2[$key]['organizacao'] = 'Esparta';
			}
			$jogadores2[$key]['nick'] = $usuario['nick'];
			$jogadores2[$key]['pontos'] = $jogadores[$key]['pontos'];
			$jogadores2[$key]['pontos2'] = $pontos;
			$jogadores2[$key]['total'] = $count;
			$jogadores2[$key]['cor'] = $cor;
			$jogadores2[$key]['resposta'] = $resposta;
		}

		$jogadores2 = json_encode($jogadores2);
		echo $jogadores2;
	}

	$_SESSION['block'] = true;
	
}elseif ($botao == 'Jogar') {
	
	// Bloco de codigos para entrar em uma partida

	session_start();

	$batalhaCTR = new app\controllers\BatalhaCTR();
	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();	
	$questaoCTR = new app\controllers\QuestaoCTR();

	// Verfica se o jogador já está em alguma sala

	$consulta = $jogador_batalhaCTR->consultarJogadorBatalha();

	foreach ($consulta as $key => $value) {
		if ($consulta[$key]['id_jogador'] == $_SESSION['id_jogador']) {
			$_SESSION['aviso'] = 'Você já está em uma batalha';
			header("Location: ../views/home.php");
			exit;
		}
	}

	$redirecionar = false;

	while ($redirecionar == false) {
		
		$salas = $batalhaCTR->consultarBatalha();

		// Lista todas as salas consultadas

		foreach ($salas as $key => $value) {
			$sala = $salas[$key]['id_batalha'];
			$total = $jogador_batalhaCTR->totalBatalha($sala);
			$count = $total['COUNT(*)'];
			
			// Verifica se existe vaga em alguma delas
			
			if($count < 12){

				$jogador_batalhaCTR->entrarBatalha($_SESSION['id_jogador'],$sala);
				$redirecionar = true;
				$_SESSION['id_batalha'] = $sala;

				// Verifica se é o primeiro jogador a entrar na sala

				if($count == 0){

					$questao = $questaoCTR->consultarQuestao();

					foreach ($questao as $key => $chave) {
						$contador = $questao[$key]['id_questao'];
					}

					$repetir = null;

					while ($repetir == null) {
						$_SESSION['id_questao'] = rand(1, $contador);
						$repetir = $jogador_batalhaCTR->requerirQuestao($_SESSION['id_questao']);
					}

					$batalhaCTR->alterarTempo(90, $sala);
					$batalhaCTR->alterarQuestao($sala, $_SESSION['id_questao']);
					$batalhaCTR->alterarPontos($sala, 100);
				}
				break;
			}
		}

		if($redirecionar == false){
			$batalhaCTR->criarBatalha();
		}

	}
	$_SESSION['jogo'] = 1;
	$_SESSION['block'] = false;
	header("Location: ../views/batalha.php");
	exit;

}elseif ($botao == 'verificarFimBatalha') {

	session_start();

	$_SESSION['block'] = true;

	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();
	$batalhaCTR = new app\controllers\BatalhaCTR();

	$jogador_batalha = $jogador_batalhaCTR->carregarJogadorBatalha($_SESSION['id_batalha']);
	$batalha = $batalhaCTR->carregarBatalha($_SESSION['id_batalha']);
	$pontos_termino = $batalha['pontos_termino'];
	$contador = 0;
	$final_batalha = false;

	foreach ($jogador_batalha as $key => $value) {
		if($jogador_batalha[$key]['pontos'] >= $pontos_termino){
			$contador += 1;
			if($jogador_batalha[0]['id_jogador'] == $_SESSION['id_jogador'] && $contador == 2){
				$pontos_termino += 10;
				$batalhaCTR->alterarPontos($_SESSION['id_batalha'],$pontos_termino);
			}		
		}		
	}

	if($contador == 1){
		$final_batalha = true;
	}

	$final_batalha2 = json_encode($final_batalha);
	echo $final_batalha2;

}elseif($botao == 'desbugarTempo'){

	// Metódo para desbugar a batalha

	session_start();

	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();
	$jogador_batalha = $jogador_batalhaCTR->carregarJogadorBatalha($_SESSION['id_batalha']);
	$id_jogadorHost = $jogador_batalha[0]['id_jogador'];
	$jogador_batalhaCTR->sairBatalha($id_jogadorHost);


}elseif ($botao == 'fimBatalha') {

	session_start();

	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();
	$classificacaoCTR = new app\controllers\ClassificacaoCTR();
	$batalhaCTR = new app\controllers\BatalhaCTR();

	$jogador_batalha = $jogador_batalhaCTR->carregarJogadorBatalha($_SESSION['id_batalha']);
	$batalha = $batalhaCTR->carregarBatalha($_SESSION['id_batalha']);
	$id_jogadorHost = $jogador_batalha[0]['id_jogador'];
	$pontos_termino = $batalha['pontos_termino'];

	if($id_jogadorHost == $_SESSION['id_jogador']){

		foreach ($jogador_batalha as $key => $value) {
			if($jogador_batalha[$key]['pontos'] >= $pontos_termino){

				$id_jogador = $jogador_batalha[$key]['id_jogador'];
				$classificacao = $classificacaoCTR->carregarClassificacao($id_jogador);
				$vitoria = $classificacao['vitoria'] + 1;
				$classificacaoCTR->acrescentarVitoria($id_jogador,$vitoria);

			}
		}
		$jogador_batalhaCTR->fimBatalha($_SESSION['id_batalha']);

	}

}elseif($botao == 'Sair'){

	session_start();

	$jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();
	$jogador_batalhaCTR->sairBatalha($_SESSION['id_jogador']);

	$_SESSION['id_batalha'] = null;
	$_SESSION['jogo'] = 0;

}else{

	// Redireciona caso página não seja solicitada

	header("Location: ../views/desenvolvedores.php");
	exit;

}

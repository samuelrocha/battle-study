<?php 

require_once '../../vendor/autoload.php';

$id_jogador = isset($_POST['id_jogador'])?$_POST['id_jogador']:null;
$id_organizacao = isset($_POST['organizacao'])?$_POST['organizacao']:null;
$botao = isset($_POST['botao'])?$_POST['botao']:null;

session_start();

if ($botao == "Escolher") {
    
    // Envia as informações
    
    $jogadorCTR = new \app\controllers\JogadorCTR();
    $jogadorCTR->escolherOrganizacao($_SESSION['id_jogador'], $id_organizacao);
    
    // Jogador retorna para configurações

    header("Location: ../views/home.php");
    exit;

}else{
    header("Location: ../views/desenvolvedores.php");
    exit;
}

<!DOCTYPE html>

<!-- Autores:

        Samuel
        Lucas
        Kevin
        Vinicius
        Vitor

!-->

<?php

require_once '../../vendor/autoload.php';

// Verifica se o usuario está logado

session_start();

if ($_SESSION['logado'] == 1) {
    
} else {
    header("Location: login.php");
    exit;
}

// Carrega o jogador

$jogadorCTR = new app\controllers\JogadorCTR();
$jogador = $jogadorCTR->carregarJogador($_SESSION['id_usuario']);
$organizacao = $jogador['id_organizacao'];

if($organizacao != null){
    header("Location: home.php");
    exit;
}

?>

<html lang="pt-BR">

<head>
    <title>Organização - BattleStudy</title>
    <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
    <link rel="icon" href="imgs/icone/Hydra.png">
    <link href="css/all.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/fonte.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/paginaorganizacao.css">
    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/jquery-3.4.1.js"></script>
    <meta charset="UTF-8">
</head>

<body>
    <div id="background"></div>
    <div onclick="escolher(2)" class="ladoEsquerdo">
        <div class="esparta">
            <span class="orgNome">ESPARTA</span>
        </div>
    </div>
    <div onclick="escolher(1)" class="ladoDireito">
        <div class="atenas">
            <span class="orgNome">ATENAS</span>
        </div>
    </div>
    <div id="preloader">
        <div class="inner">
            <!-- HTML DA ANIMAÇÃO MUITO LOUCA DO SEU PRELOADER! -->
            <div class="organizacao">
                <span id="escolha">ESCOLHA SUA ORGANIZAÇÃO</span>
                <img id="imagemLogo" src="imgs/logo/logo-fundo-colorido.png">
            </div>

        </div>
    </div>
</body>
<script type="text/javascript">
    $(window).on('load', function () {
        $('#preloader .inner').delay(1500).fadeOut(3000);
        $('#preloader').delay(1500).fadeOut(3000);
        $('body').delay(350).css({ 'overflow': 'visible' });
    })

    function escolher(resposta) {
        var xhttp;
        xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                window.location.href = "home.php";
            }
        };
        xhttp.open("POST", "../logic/jogador.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send('botao=Escolher&organizacao='+resposta);   
    }
</script>

</html>
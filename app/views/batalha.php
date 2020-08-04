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
    
session_start();

if ($_SESSION['logado'] == 1 && $_SESSION['jogo'] == 1) {
    
} elseif($_SESSION['logado'] == 1) {
    $jogador_batalhaCTR = new app\controllers\Jogador_BatalhaCTR();
    $jogador_batalhaCTR->sairBatalha($_SESSION['id_jogador']);
    header("Location: home.php");
    exit;
}else{
    header("Location: login.php");
    exit;
}

$jogadorCTR = new \app\controllers\JogadorCTR();
$jogador = $jogadorCTR->carregarJogador($_SESSION['id_usuario']);
$id_organizacao = $jogador['id_organizacao'];

if($id_organizacao == null){
    header("Location: organizacao.php");
    exit;
}

$_SESSION['jogo'] = 0;

?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <title>Batalha - BattleStudy</title>
    <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
    <link rel="icon" href="imgs/icone/Hydra.png">
    <link href="css/all.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/fonte.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/nav2.css">
    <link type="text/css" rel="stylesheet" href="css/paginaBatalha.css">
    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/jquery-3.4.1.js"></script>
    <meta charset="UTF-8">
    <script type="text/javascript" src="js/batalha.js"></script>
</head>

<body>
    <div class="background">
    </div>
    <div class="row header">
        <!-- Nav -->
        <div class="col l12 m12 s12">
            <nav class="navSite01">
                <div class="col s12">
                    <div class="nav-wrapper container"></a>
                        <a href="#" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png"
                                id="logoSite01" class="responsive-img"></a>
                    </div>
                    <ul class="right">
                        <li class=" "><a class="botaoMenus" onclick="AtivarDesativarFS()"><i
                                    class="fas fa-expand-arrows-alt botaoMenu"></i></a>
                        </li>
                        <li onclick="sair()" class=" "><a href="home.php" class="botaoMenus "><i class="fas fa-reply botaoMenu"></i></a></li>
                    </ul>
                </div>
            </nav>
            <nav class="navSite02">
                <ul id="slide-out" class="sidenav">
                    <li><a class="subheader">Opções</a></li>
                    <li onclick="sair()"><a href="home.php">Sair da partida</a></li>
                    <li>
                        <div class="divider"></div>
                    </li>
                    <li><a class="subheader tituloClassificacao">Classificação</a></li>
                    <li><table class="tabela">
                        <tbody>
                            <?php
                                for ($i=13; $i <= 24; $i++) { 
                                    echo "<tr id='bloco$i' style='display: none;'>";
                                        echo "<td class='imagemJogadores' id='imagem$i'>";
                                        echo "</td>";
                                        echo "<td>";
                                            echo "<div class='row informacoesJogador'>";
                                                echo "<div class='col l12 s12 m12'>";
                                                    echo "<span class='nickname' id='nickname$i'>Nickname</span>";
                                                echo "</div>";
                                                echo "<div class='col l6 left'>";
                                                    echo "<span class='org' id='org$i'>Atenas</span>";
                                                echo "</div>";
                                                echo "<div class='col l6 right'>";
                                                    echo "<span class='org' id='pontos'><span id='pontuacao$i'>100</span> PTS</span>";
                                                echo "</div>";
                                            echo "</div>";
                                        echo "</td>";
                                    echo "</tr>";
                                }
                            ?>
                        </tbody>
                    </table></li>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
                <div class="nav-wrapper container"></a>
                    <a href="#" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png"
                            id="logoSite" class="responsive-img"></a> </div>
            </nav>
        </div>
    </div>
    <!-- Fim do Nav -->
    <!-- Início do Conteúdo -->
    <div class="row container01">
        <div class="col s12 m12">
            <div class="tempoJogador">
                <span class="tempo" id="tempoJogador"></span><span class="tempo" id="pontosJogador"><span id="result">0</span> PTS</span>
            </div>
        </div>
        <div class="col l3 s12 m12 artigo01">
            <table>
                <tbody>
                    <?php
                        for ($i=1; $i <= 12; $i++) { 
                            echo "<tr id='bloco$i' style='display: none;'>";
                                echo "<td class='imagemJogadores' id='imagem$i'>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<div class='row'>";
                                        echo "<div class='col l12 s12 m12'>";
                                            echo "<span class='nickname' id='nickname$i'>Nickname</span>";
                                        echo "</div>";
                                        echo "<div class='col l6 left'>";
                                            echo "<span class='org' id='org$i'>Atenas</span>";
                                        echo "</div>";
                                        echo "<div class='col l6 right'>";
                                            echo "<span class='org' id='pontos'><span id='pontuacao$i'>100</span> PTS</span>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col l9 s12 m12 artigo02">
            <div class="row container02 center-align">
                <div class="col l12 s12 m12 numQuestao">
                    <span id="numQuestao">questão
                    </span>
                </div>
                <div class="col l12 s12 m12 pergEspaco">
                    <span id="pergQuestao"></span>
                </div>
                <div class="col l12 s12 m12 alternativas" onclick='responder(1)' id="pintar1">
                    <span>A - </span><span id='alternativa_a' class="respQuestao"></span>
                </div>
                <div class="col l12 s12 m12 alternativas" onclick='responder(2)' id="pintar2">
                    <span>B - </span><span id='alternativa_b' class="respQuestao"></span>
                </div>
                <div class="col l12 s12 m12 alternativas" onclick='responder(3)' id="pintar3">
                    <span>C - </span><span id='alternativa_c' class="respQuestao"></span>
                </div>
                <div class="col l12 s12 m12 alternativas" onclick='responder(4)' id="pintar4">
                    <span>D - </span><span id='alternativa_d' class="respQuestao"></span>
                </div>
                <div class="col l12 s12 m12 alternativas" onclick='responder(5)' id="pintar5">
                    <span>E - </span><span id='alternativa_e' class="respQuestao"></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Fim do Conteúdo -->
    <script>
        M.AutoInit();
        
        isFullScreen = false;
var elem = document.documentElement;
function AtivarDesativarFS() {
    //Se o estado atual for "FullScreen", desativá-lo.
    //Note que para as verificações é feito uma validação para todos os possíveis navegadores, facilitando a sua vida.
      if (document.exitFullscreen) {
      document.exitFullscreen();
      isFullScreen = false;
    } else if (document.mozCancelFullScreen) { /* Firefox */
      document.mozCancelFullScreen();
      isFullScreen = false;
    } else if (document.webkitExitFullscreen) { /* Chrome, Safari & Opera */
      document.webkitExitFullscreen();
    } else if (document.msExitFullscreen) { /* IE/Edge */
      document.msExitFullscreen();
      isFullScreen = false;
    }


  if (elem.requestFullscreen) {
     elem.requestFullscreen();
     isFullScreen = true;
  } else if (elem.mozRequestFullScreen) { /* Firefox */
     elem.mozRequestFullScreen();
      isFullScreen = true;
  } else if (elem.webkitRequestFullscreen) { /* Chrome, Safari & Opera */
    elem.webkitRequestFullscreen();
     isFullScreen = true;
  } else if (elem.msRequestFullscreen) { /* IE/Edge */
    elem.msRequestFullscreen();
     isFullScreen = true;
  }

}
    </script>
</body>

</html>
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

    if ($_SESSION['logado'] == 1) {
    
    } else {
        header("Location: login.php");
        exit;
    }

    $jogadorCTR = new \app\controllers\JogadorCTR();
    $classificacaoCTR = new app\controllers\ClassificacaoCTR();
    $usuarioCTR = new \app\controllers\UsuarioCTR();

    $jogador = $jogadorCTR->carregarJogador($_SESSION['id_usuario']);
    $id_organizacao = $jogador['id_organizacao'];

    if($id_organizacao == null){
        header("Location: organizacao.php");
        exit;
    }

    
    $ordem = $classificacaoCTR->consultarClassificacao();

    $posicao = 1;
    foreach ($ordem as $key => $chave) {
      $classificacaoCTR->atualizar($ordem[$key]['id_classificacao'],$posicao);
      $posicao += 1;
    }
    
    // Carrega as informações do usuario logado

    $ordem = $classificacaoCTR->consultarClassificacao();
    $jogador1 = $jogadorCTR->carregarJogador($_SESSION['id_jogador']);
    $usuario1 = $usuarioCTR->carregarUsuarioId($_SESSION['id_usuario']);
    $organizacao1 = $jogadorCTR->carregarOrganizacao($jogador1['id_organizacao']);
    $rankInfo = $classificacaoCTR->carregarClassificacao($_SESSION['id_jogador']);
    $rankPosicao = $rankInfo['posicao'];
    $rankVitoria = $rankInfo['vitoria'];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <title>Ranking - BattleStudy</title>
    <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
    <link rel="icon" href="imgs/icone/Hydra.png">
    <link href="css/all.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/fonte.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/nav.css">
    <link type="text/css" rel="stylesheet" href="css/paginaranking.css">
    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/jquery-3.4.1.js"></script>
    <meta charset="UTF-8">
</head>

<body>
    <!-- Header -->
    <div class="row header">
        <div class="col l12 m12 s12">
            <nav class="navSite01">
                <div class="col s12">
                    <div class="nav-wrapper container"></a>
                        <a href="home.php" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png"
                                id="logoSite" class="responsive-img"></a>
                    </div>
                    <ul class="right">
                        <li class=" "><a href="home.php" class="white-text flow-text">Início</a></li>
                        <li>
                            <form action="../logic/login.php" method="post">
                                <input type="submit" name="botao" class="white-text flow-text" id="Sair" value="Sair">
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav class="navSite02">
                <ul id="slide-out" class="sidenav">
                    <li><a class="subheader">Opções</a></li>
                    <li><a href="home.php">Início</a></li>
                    <li><a href="perfil.php">Perfil</a></li>
                    <li>
                        <form action="../logic/login.php" method="post">
                            <a>
                                <input type="submit" name="botao" class="black-text" id="Sair" value="Sair">
                            </a>
                        </form>
                    </li>
                    <li>
                        <div class="divider"></div>
                    </li>
                    <li><a class="subheader">Informações</a></li>
                    <li><a class="waves-effect" href="desenvolvedores.php">Conheça nossa Equipe!</a></li>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger" id="iconeMenu"><i class="fas fa-bars"></i></a>
                <div class="nav-wrapper container"></a>
                    <a href="home.php" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png"
                            id="logoSite" class="responsive-img"></a> </div>
            </nav>
        </div>
        <!-- Fim do Nav -->
    </div>
    <!-- Fim do Header -->

    <!-- Conteúdo -->
    <div class="row container conteudoGeral">
        <!-- Artigo 1 -->
        <div class="col l4">
            <div class="row center infoJogador">
                <div class="col l12 m3 s12">
                    <?php
                        if($organizacao1['nome'] == 'Atenas'){
                            echo '<img src="imgs/icone/atenas2.jpg" class="circle imagemJogador">';
                        }else{
                            echo '<img src="imgs/icone/esparta2.jpg" class="circle imagemJogador">';
                        }    
                    ?>
                </div>
                <div class="col l12 m9 s12">
                    <span id="nomeJogador"><?php echo $usuario1['nick']; ?></span>
                </div>
                <div class="col l12 m9 s12 orgMobile">
                    <span id="orgJogador"><?php echo $organizacao1['nome']; ?></span>
                </div>
                <div class="col l12 s12 escudoJogador">
                    <img src="imgs/estrela.png" class="imgVitorias">
                </div>
                <div class="col l12 m9 s12">
                    <span id="vitoriasJogador"><?php echo $rankVitoria ?> Vitórias</span>
                </div>
                <div class="col l12 m9 s12">
                    <span id="posicaoJogador"><?php echo $rankPosicao ?>° Posição</span>
                </div>
            </div>
        </div>
        <!-- Fim do Artigo 1 -->
        <!-- Artigo 2 -->
        <div class="col l8 m12 s12 ranking">
            <div class="tituloJogadores center">
                Jogadores
            </div>
            <table class="highlight tabela container">
                <tbody>
                </tbody>
                    <?php

                        foreach ($ordem as $key => $value) {
                            
                            $jogador = $jogadorCTR->carregarJogador($ordem[$key]['id_jogador']);
                            $usuario = $usuarioCTR->carregarUsuarioId($jogador['id_usuario']);
                            if($jogador['id_organizacao'] == 1){
                                $organizacao = 'Atenas';
                            }else{
                                $organizacao = 'Esparta';
                            }

                            echo "<tr>";
                                echo "<td>";
                                    echo "<span class='posicao'>". ($key+1) ."°</span>";
                                echo "</td>";
                                echo "<td class='imagemJogadores'>";
                                    if($organizacao == "Atenas"){
                                        echo "<img src='imgs/icone/atenas2.jpg' class='circle imagem'>";
                                    }else{
                                        echo "<img src='imgs/icone/esparta2.jpg' class='circle imagem'>";
                                    }
                                    
                                echo "</td>";
                                echo "<td>";
                                    echo "<div class='row'>";
                                        echo "<div class='col l12 s12 m12'>";
                                            echo "<span class='nickname'>". $usuario['nick'] ."</span>";
                                        echo "</div>";
                                        echo "<div class='col l6 left'>";
                                            echo "<span class='org'>". $organizacao ."</span>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</td>";
                                echo "<td>";
                                    echo "<div class='row'>";
                                        echo "<div class='col l12 s12 m12'>";
                                            echo "<span class='tituloVitorias'>Vitórias</span>";
                                        echo "</div>";
                                        echo "<div class='col l12 s12 m12'>";
                                            echo "<span class='vitorias'>". $ordem[$key]['vitoria'] ."</span>";
                                        echo "</div>";
                                    echo "</div>";
                                echo "</td>";
                            echo "</tr>";

                        }
                    ?>
                </tbody>
            </table>
        </div>
        <!-- Fim do Artigo 2 -->
    </div>
    <!-- Fim do Conteúdo-->

    <script>
        M.AutoInit();
    </script>

</body>

</html>

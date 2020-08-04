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

// Carrega o id do usuario

$usuarioCTR = new app\controllers\UsuarioCTR();
$usuario = $usuarioCTR->carregarUsuario($_SESSION['usuario']);
$nick = $usuario['nick'];
$_SESSION['id_usuario'] = $usuario['id_usuario'];

$senha = $usuario['senha'];

if(!empty($_SESSION['cookie'])){
    setcookie('usuario', $_SESSION['usuario'], (time() + 2592000));
}

// Carrega o jogador

$jogadorCTR = new app\controllers\JogadorCTR();
$jogador = $jogadorCTR->carregarJogador($_SESSION['id_usuario']);
$id_organizacao = $jogador['id_organizacao'];
$_SESSION['id_jogador'] = $jogador['id_jogador'];

$organizacao = $jogadorCTR->carregarOrganizacao($id_organizacao);
$nome_org = $organizacao['nome'];


if($id_organizacao == null){
    header("Location: organizacao.php");
    exit;
}

$classificacaoCTR = new app\controllers\ClassificacaoCTR();
$ordem = $classificacaoCTR->consultarClassificacao();

foreach ($ordem as $key => $chave) {
  $i = $key;
  foreach ($ordem[$i] as $chave) {
    $ordem2[$i][] = $chave;
  }
}

$posicao = 1;
foreach ($ordem2 as list($a, $b, $c, $d)) {
  $classificacaoCTR->atualizar($a,$posicao);
  $posicao += 1;
}

$rankInfo = $classificacaoCTR->carregarClassificacao($_SESSION['id_jogador']);
$rankPosicao = $rankInfo['posicao'];
$rankVitoria = $rankInfo['vitoria'];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <title>Home - BattleStudy</title>
  <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
    <link rel="icon" href="imgs/icone/Hydra.png">
  <link href="css/all.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/fonte.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/fonte.css">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/nav.css">
  <link type="text/css" rel="stylesheet" href="css/paginausuario.css">
  <script src="js/materialize.js"></script>
  <script src="js/materialize.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="js/jquery-3.4.1.js"></script>
  <meta charset="UTF-8">
</head>

<body>
  <!-- Nav -->
  <div class="row header">
    <div class="col l12 m12 s12">
      <nav class="navSite01">
        <div class="col s12">
          <div class="nav-wrapper container"></a>
            <a href="home.php" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png" id="logoSite"
                class="responsive-img"></a>
          </div>
          <ul class="right">
            <li class=" "><a href="ranking.php" class="white-text flow-text">Ranking</a></li>
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
          <li><a href="perfil.php">Perfil</a></li>
          <li><a href="ranking.php">Ranking</a></li>
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
        <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
        <div class="nav-wrapper container"></a>
          <a href="home.php" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png" id="logoSite"
              class="responsive-img"></a> </div>
      </nav>
    </div>
    <!-- Fim do Nav -->

    <!-- Conteúdo 1 -->

    <!-- Foto do Jogador -->
    <div class="col m12 s12 l3 ">
      <a href="perfil.php">
        <?php 

          if($nome_org == 'Atenas'){
            echo '<img class="right circle responsive-img" src="imgs/icone/atenas.jpg"
          id="imgJogador01">';
          }else{
            echo '<img class="right circle responsive-img" src="imgs/icone/esparta.jpg"
          id="imgJogador01">';
          }

        ?>
      </a>
      <a href="perfil.php">
        <?php 

          if($nome_org == 'Atenas'){
            echo '<img class="circle responsive-img middle container" src="imgs/icone/atenas.jpg" id="imgJogador02">';
          }else{
            echo '<img class="circle responsive-img middle container" src="imgs/icone/esparta.jpg" id="imgJogador02">';
          }

        ?>
        
        </a>
    </div>
    <!-- Fim da Foto do Jogador -->

    <!-- Nome do Jogador -->
    <div class="col m12 s12 l9 nomeJogador ">
      <a href="perfil.php"><span class="white-text" id="nomeJogador"><?php echo $nick; ?></span></a>
    </div>
  </div>
  <!-- Fim do Nome do Jogador -->
  <div class="row fundo">
    <div class="col l1 left pilar">
      <img src="imgs/pilar.png" class="pilares">
    </div>
    <div class="col l1 right pilar">
      <img src="imgs/pilar.png" class="pilares">
    </div>
    <!-- Organização -->
    <div class="orgJogador">
      <a href="perfil.php"><span class="flow-text" id="orgJogador"><?php echo $nome_org ?></span></a>
    </div>
    <!-- Fim da Organização -->
    <div class="container">
      <div class="row article01">
        <div class="col l5 s12 m12 conteudoJogar">
          <div class="row artigo01">
            <div class="col l12 s12 m12 center article02">
              <img src="imgs/jogar.png" class="responsive-img" id="imgJogar">
            </div>
            <div class="col l12 s12 m12 center">
              <form action="../logic/jogador_batalha.php" method="POST">
                <input type="submit" name="botao" class="waves-light btn-large center" id="botaoJogar" value="Jogar">
              </form>
            </div>
          </div>
        </div>
        <div class="col l5 s12 m12 article03">
          <div class="row faixa01">
            <div class="col l12 s12 m12 center">
              <img src="imgs/escudo.png" class="responsive-img" id="imgVitorias">
            </div>
            <div class="col l12 s12 m12 center">
              <span id="textoVitorias"><?php echo $rankVitoria ?> Vitórias</span>
            </div>
            <div class="col l12 s12 m12 center">
              <span id="textoPosicao">Posição <?php echo $rankPosicao ?>°</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img src="imgs/faixa grega azul.png" class="responsive-img faixa02">
  </div>
  <div class="row fundo2">
    <!-- Organização -->
    <div class="orgJogador">
      <a href="perfil.php"><span class="flow-text" id="orgJogador"><?php echo $nome_org ?></span></a>
    </div>
    <!-- Fim da Organização -->
    <div class="container">
      <div class="row article01">
        <div class="col l6 s12 m12 conteudoJogar">
          <div class="row artigo01">
            <div class="col l12 s12 m12 center article02">
              <img src="imgs/jogar.png" class="responsive-img" id="imgJogar">
            </div>
            <div class="col l12 s12 m12 center">
              <form action="../logic/jogador_batalha.php" method="POST">
                <input type="submit" name="botao" class="waves-light btn-large center" id="botaoJogar" value="Jogar">
              </form>
            </div>
          </div>
        </div>
        <div class="col l6 s12 m12 center article03">
          <div class="row">
            <div class="col l12 s12 m12 center">
              <img src="imgs/escudo.png" class="responsive-img" id="imgVitorias">
            </div>
            <div class="col l12 s12 m12 center">
              <span id="textoVitorias"><?php echo $rankVitoria ?> Vitórias</span>
            </div>
            <div class="col l12 s12 m12 center">
              <span id="textoPosicao">Posição <?php echo $rankPosicao ?>°</span>
            </div>
          </div>
        </div>
      </div>
    </div>
    <img src="imgs/faixa grega azul.png" class="responsive-img faixa03">
  </div>
  <script>
    M.AutoInit();

    <?php 

        if($_SESSION['aviso'] != null){
          echo "M.toast({html: '" . $_SESSION["aviso"] . "'})";
        }
        $_SESSION['aviso'] = null;

    ?>

  </script>
</body>

</html>
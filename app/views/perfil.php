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

    // Carrega informações necessarias do usuario

    $usuarioCTR = new \app\controllers\UsuarioCTR();
    $perfil = $usuarioCTR->carregarUsuario($_SESSION['usuario']);
    $nick = $perfil['nick'];
    $descricao = $perfil['descricao'];
    $ocupacao  =$perfil['ocupacao'];
    $data_nascimento = $perfil['data_nascimento'];
    $sexo = $perfil['sexo'];
    $atual = date('Y-m-d');
    $data1 = new DateTime( $atual );
    $data2 = new DateTime( $data_nascimento );
    $idade = $data1->diff( $data2 );
    
    // Carrega informações necessarias da organizacao

    $jogadorCTR = new \app\controllers\JogadorCTR();
    $jogador = $jogadorCTR->carregarJogador($_SESSION['id_usuario']);
    $id_organizacao = $jogador['id_organizacao'];
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

<html lang="pt-BR">

<head>
  <title>Perfil - BattleStudy</title>
  <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
  <link rel="icon" href="imgs/icone/Hydra.png">
  <link href="css/all.css" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/fonte.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/nav.css">
  <link type="text/css" rel="stylesheet" href="css/paginaperfil.css">
  <script src="js/materialize.js"></script>
  <script src="js/materialize.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="js/jquery-3.4.1.js"></script>
  <meta charset="UTF-8">
</head>

<body>
  <div class="row header">
    <!-- Nav -->
    <div class="col l12 m12 s12">
      <nav class="navSite01">
        <div class="col s12">
          <div class="nav-wrapper container"></a>
            <a href="home.php" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png" id="logoSite"
                class="responsive-img"></a>
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
          <li><a href="ranking.php">Ranking</a></li>
          <li>
            <form action="../logic/login.php" method="POST"> <a> <input type="submit" name="botao" class="black-text" id=Sair value="Sair"> </a> </form>
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
      <div class="imgPerfil2">
        <?php 

          if($nome_org == 'Atenas'){
            echo '<img src="imgs/icone/atenas2.jpg" class="responsive-img circle" id="imgPerfil2">';
          }else{
            echo '<img src="imgs/icone/esparta2.jpg" class="responsive-img circle" id="imgPerfil2">';
          }

        ?>
      </div>
    </div>
    <form action="" method="POST">
      <a href="configuracoes.php" id="editarPerfil02" class="right btn">Editar Perfil</a>
    </form>
    <div class="imgPerfil">
      <?php 

        if($nome_org == 'Atenas'){
          echo '<img src="imgs/icone/atenas2.jpg" class="responsive-img circle" id="imgPerfil">';
        }else{
          echo '<img src="imgs/icone/esparta2.jpg" class="responsive-img circle" id="imgPerfil">';
        }

      ?>
    </div>
  </div>

  <div class="row container conteudo01">
    <div class="col l4 m12 s12">
      <div class="row artigo01">
        <div class="col m12 s12 l12 nomeJogador center">
          <span id="nomeJogador"><?php echo $nick;?></span>
        </div>
        <div class="col m12 s12 l12 orgJogador center">
          <span id="orgJogador"><?php echo $nome_org; ?></span>
        </div>
        <div class="col m12 s12 l12 center conteudoCentro">
          <span id="idade">Idade: </span> <span id="idadeJogador"><?php echo $idade->y; ?></span>
        </div>
        <div class="col m12 s12 l12 center">
          <span id="sexo">Sexo: </span> <span id="sexoJogador"><?php
            if($sexo == null){
              echo "Indefinido";
            }else{
              echo $sexo;
            }

          ?></span>
        </div>
        <div class="col m12 s12 l12 center conteudoCentro">
          <span id="ocupacao">Ocupação</span>
        </div>
        <div class="col m12 s12 l12 center">
          <span id="ocupacaoJogador"><?php 
            if($ocupacao == null){
              echo "Indefinido";
            }else{
              echo $ocupacao;
            }

          ?></span>
        </div>
      </div>
    </div>
    <div class="col l4 m12 s12 center">
      <div class="row">
        <div class="col s12 m12 l12 descricao">
          <span id="descricao">Descrição</span>
        </div>
        <div class="col s12 m12 l12 center">
          <p id="descJogador">
            <?php
              if($descricao == null){
                echo "Se tem div tem que ter classe";
              }else{
                echo $descricao;
              }
            ?>
          </p>
        </div>
      </div>
    </div>
    <div class="col l4 m12 s12">
      <form action="#" method="POST">
        <a href="configuracoes.php" id="editarPerfil01" class="right btn">Editar Perfil</a>
      </form>
      <div class="row">
        <div class="col s12 l12 m12 center">
          <img src="imgs/escudo.png" class="responsive-img" id="imgVitoria">
        </div>
        <div class="col l12 s12 m12 center">
          <span id="vitoriasJogador"><?php echo $rankVitoria ?></span><span id="vitorias"> Vitórias</span>
        </div>
        <div class="col l12 s12 m12 center">
          <span id="posicao">Posição </span> <span id="posicaoJogador"> <?php echo $rankPosicao ?>°</span>
        </div>
      </div>
    </div>

  </div>
  <img src="imgs/faixa grega azul.png" class="responsive-img faixa02">


  <script>
    M.AutoInit();
  </script>


</body>

</html>
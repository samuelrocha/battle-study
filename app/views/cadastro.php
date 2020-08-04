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
    
    $_SESSION['logado'] = isset($_SESSION['logado'])?$_SESSION['logado']:0;
    
    if ($_SESSION['logado'] == 0) {
    
    } else {
    header("Location: home.php");
    exit;
    }

?>
<html lang="pt-BR">
<head>
  <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
    <link rel="icon" href="imgs/icone/Hydra.png">
    <link type="text/css" rel="stylesheet" href="css/fonte.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/cssindex.css">
  <link type="text/css" rel="stylesheet" href="css/cadastro.css">
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="UTF-8">
</head>

<body>
  <!-- Nav -->
  <nav class="white header">
    <div class="nav-wrapper container"></a>
      <a href="login.php" class="brand-logo black-text"><img src="imgs/logo/logo-padrão.png" id="logoSite"
          class="responsive-img"></a>
      <ul class="right">
        <li class="white "><a href="login.php" class="black-text botaoPagina">Entrar</a></li>
      </ul>
    </div>
  </nav>
  <!-- Fim do Nav-->

  <!-- Conteúdo Principal-->
  <div class="conteudo">
    <div class="row container conteudo0">
      <div class="col l7  divisao1">
        <span class="white-text textao">LUTE EM UMA BATALHA <br /> POR SABEDORIA ATÉ A EXAUSTÃO</span>
        <div class="row">
          <div class="col l6 ">
            <span class="white-text flow-text">Derrote seus adversários em uma batalha de conhecimento, e demonstre
              toda sua sabedoria!</span>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col l5 s12">
          <div class="row">
            <div class="col s12 m12 l12 container cadastroBorda">
              <div class="card white cardLogin" id="card-Cadastro">
                <div class="card-content black-text cardConteudo">
                  <span class="card-title tituloLogin">Cadastro</span>
                  <p class="black-text flow-text">"Junte-se a essa batalha por conhecimento!"</p>
                </div>
                <div class="card-action formulario">
                  <form action="../logic/usuario.php" method="post">

                    <div class="row">
                      <div class="input-field col l12 m12 s12">
                        <input type="text" minlength="6" maxlength="21" name="usuario" required>
                        <label for="usuario">Usuário</label>
                      </div>
                      <div class="input-field col l12 m12 s12">
                        <input type="text" minlength="4" maxlength="21" name="nick" required>
                        <label for="nickname">Nickname</label>
                      </div>
                      <div class="input-field col l12 m12 s12">
                        <input type="email" maxlength="150" name="email" required>
                        <label for="email">Email</label>
                      </div>
                      <div class="input-field col l12 m12 s12">
                        <input type="password" minlength="6" maxlength="36" name="senha" required>
                        <label for="senha">Senha</label>
                      </div>
                      <div class="input-field col l12 m12 s12">
                        <input type="password" minlength="6" maxlength="36" name="con_senha" required>
                        <label for="confirmarsenha">Confirmar Senha</label>
                      </div>
                      
                      </label>
                    </div>
                    <div class="row">
                      <input type="submit" name="botao" class="waves-light btn-large" id="submit" value="Cadastrar">
                    </div>
                </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Fim do Conteúdo Principal-->
  <!-- Artigo 1 -->
  <div class="row article1">
  <img src="imgs/artigo1.png" class="responsive-img img01Artigo1">
  <img src="imgs/artigo2.png" class="responsive-img img02Artigo1">
</div>
<div class="row article1">
  <div class="img01Artigo0 artigo02back">
    <div class="row artigo02">
      <div class="col l6 m12 s12 artigo02coluna">
        <img src="imgs/equipe.png" class="equipe responsive-img">
      </div>
      <div class="col l6 m12 s12 artigo02texto">
        <span class="textoEquipe">"Se tem div, tem que ter classe"</span>
        <span class="descricaoEquipe"> Conheça a equipe de desenvolvimento responsável
          por esse incrível site!
        </span>
        <div><a href="desenvolvedores.php" class="btn-large botaoEquipe">Ver mais!</a></div>    
      </div>
    </div>
  </div>
</div>

  <!-- Fim do Artigo 1 -->

  <!-- Footer -->
  <footer class="page-footer">
    <div class="row container">
      <div class="col l8">
        <h4>BattleStudy</h4>
        <p>Um jogo de perguntas e respostas mais emocionante que o Roda a Roda!</p>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container center">
        © 2019 - Todos os Direitos Reservados
      </div>
    </div>
  </footer>
  <!--JavaScript at end of body for optimized loading-->
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <script src="js/materialize.js"></script>
    <script type="text/javascript">
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
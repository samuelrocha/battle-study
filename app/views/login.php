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
  <title>Login - BattleStudy</title>
  <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
  <link rel="icon" href="imgs/icone/Hydra.png">
  <link type="text/css" rel="stylesheet" href="css/fonte.css">
  <!--Import Google Icon Font-->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!--Import materialize.css-->
  <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
  <link type="text/css" rel="stylesheet" href="css/cssindex.css">
  <script type="text/javascript" src="js/materialize.min.js"></script>
  <!--Let browser know website is optimized for mobile-->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta charset="UTF-8">
</head>

<body>
  <!-- Nav/Header -->
  <nav class="white header">
    <div class="nav-wrapper container"></a>
      <a href="login.php" class="brand-logo black-text"><img src="imgs/logo/logo-padrão.png" id="logoSite" class="responsive-img"></a>
      <ul class="right">
        <li class="white "><a href="cadastro.php" class="black-text botaoPagina">Cadastrar</a></li>
      </ul>
    </div>
  </nav>
  <!-- Conteúdo Principal-->
  <div class="conteudo">
    <div class="row container conteudo0">
      <div class="col l7  divisao1">
        <span class="white-text textao">LUTE EM UMA BATALHA <br /> POR SABEDORIA ATÉ A EXAUSTÃO</span>
        <div class="row">
          <div class="col l6 m12 s12">
            <span class="white-text flow-text">Derrote seus adversários em uma batalha de conhecimento, e demonstre
             toda sua sabedoria!   
           </span>
         </div>
       </div>
     </div>
     <div class="row">
      <div class="col l5 m12 s12">
        <div class="row">
          <div class="col s12 m12 l12 container">
            <div class="card white cardLogin  ">
              <div class="card-content black-text">
                <span class="card-title tituloLogin">Login</span>
                <p class="black-text flow-text">"Uma arena para testar sua inteligência."</p>
              </div>
              <div class="card-action formulario">
                <form action="../logic/login.php" method="post">
                  <div class="input-field col l12 m12 s12">
                    <input type="text" maxlength="21" name="usuario" value="<?php if(!empty($_COOKIE['usuario'])){
                      echo $_COOKIE['usuario'];}?>" required>
                    <label for="usuario">Usuário</label>
                  </div>
                  <div class="input-field col l12 m12 s12">
                    <input type="password" maxlength="36" name="senha" required>
                    <label for="senha">Senha</label>
                  </div>
                  <div class="col l6 m6 s6">
                    <label class="left black-text ">
                      <input type="checkbox" name="lembrarsenha" class="botaoLembrar"> 
                      <span class="textoform">
                        Lembrar Usuário
                      </span>
                    </label>
                  </div>
               </div> 
               <div class="row">
                <div class="col l12 m12 s12">
                  <input type="submit" class="waves-light btn-large center" name="botao" id="submit" value="Entrar">
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
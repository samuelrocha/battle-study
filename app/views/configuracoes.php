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

    // Carregar todas as infos que serão exibidas na página

    $usuario = new \app\controllers\UsuarioCTR();
    $perfil = $usuario->carregarUsuario($_SESSION['usuario']);
    $nick = $perfil['nick']; 
    $email = $perfil['email']; 
    $senha = $perfil['senha'];
    $descricao = $perfil['descricao'];
    $data_nascimento = $perfil['data_nascimento'];
    $sexo = $perfil['sexo'];
    $descricao = $perfil['descricao'];
    $ocupacao = $perfil['ocupacao'];

    $jogadorCTR = new \app\controllers\JogadorCTR();
    $jogador = $jogadorCTR->carregarJogador($_SESSION['id_usuario']);
    $id_organizacao = $jogador['id_organizacao'];

    if($id_organizacao == null){
        header("Location: organizacao.php");
        exit;
    }

    $organizacao = $jogadorCTR->carregarOrganizacao($id_organizacao);
    $nome_org = $organizacao['nome'];

    // Trata a data antes de exibir na tela

    if($data_nascimento != null){
        $meses = array('Jan', 'Feb', 'Mar', 'Apr', 'May' , 'Jun', 'Jul', 'Aug', 'Sep', 'Oct' , 'Nov', 'Dec');
        $separada = explode("-",$data_nascimento);
        $separada[1] = $meses[$separada[1] - 1];
        $data_nascimento = $separada[1]." ". $separada[2] . ", " . $separada[0];
    }

?>

<html lang="pt-BR">

<head>
    <title>Configurações - BattleStudy</title>
    <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
    <link rel="icon" href="imgs/icone/Hydra.png">
    <link href="css/all.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/fonte.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/nav.css">
    <link type="text/css" rel="stylesheet" href="css/paginaEditar.css">
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
                    <a href="home.php" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png"
                            id="logoSite" class="responsive-img"></a> </div>
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
    <div class="row container">
        <div class="col l4 m12 s12">
            <div class="row artigo01 center">
                <form action="../logic/usuario.php" method="POST">
                    <div class="col m12 s12 l12 nomeJogador center">
                        <span id="nomeJogador"><?php echo strtoupper($nick) ?></span>
                    </div>
                    <div class="col m12 s12 l12 orgJogador center">
                        <span id="orgJogador"><?php echo $nome_org ?></span>
                    </div>
                    <div class="formulario01">
                        <div class="input-field col m12 s12 l12 center conteudoCentro">
                            <?php 
                                    echo "<input type='text' name='data_nascimento' class='datepicker' placeholder='Data de Nascimento' value='$data_nascimento' required>";  
                            ?>
                        </div>
                        <div class="input-field col m12 s12 l12 center">
                            <select name="sexo">
                                <?php 

                                    if($sexo == null){
                                        echo '<option value="" disabled selected>Escolha seu sexo</option>' .
                                        '<option value="Masculino">Masculino</option>' .
                                        '<option value="Feminino">Feminino</option>';
                                    }elseif ($sexo == 'Masculino') {
                                        echo '<option value="" disabled>Escolha seu sexo</option>' .
                                        '<option value="Masculino" selected>Masculino</option>' .
                                        '<option value="Feminino">Feminino</option>';
                                    }else{
                                        echo '<option value="" disabled>Escolha seu sexo</option>' .
                                        '<option value="Masculino">Masculino</option>' .
                                        '<option value="Feminino" selected>Feminino</option>';
                                    }
                                
                                ?>
                            </select>
                        </div>
                        <div class="col m12 s12 l12 center conteudoCentral">
                            <span id="ocupacao">Ocupação</span>
                        </div>
                        <div class="input-field col m12 s12 l12 center">
                            <?php 

                                echo "<input type='text' name='ocupacao' value=$ocupacao>";
                            
                            ?>
                            <label for="ocupacao">Ocupação</label>
                        </div>
                    </div>
            </div>
        </div>
        <div class="col l4 m12 s12 center">
            <div class="row article02">
                <div class="col s12 m12 l12 descricao">
                    <span id="descricao">Descrição</span>
                </div>
                <div class="input-field col s12 m12 l12">
                        <?php 
                            echo "<textarea id='descricao' name='descricao' placeholder='Adicione uma descrição!'' maxlength='255'>$descricao</textarea>";
                        ?>
                </div>
            </div>
        </div>
        <div class="col l4 m12 s12">
            <div class="botao01">
                <button type="submit" name="botao" id="salvarPerfil" class="right btn" value="Salvar">Salvar</button>
                <a href="perfil.php" id="descartePerfil" class="right btn">Descartar Alterações</a>
            </div>
            <div class="row">
                <div class="col l12 s12 m12 center configuracao">
                    <span id="configuracao">Configurações</span>
                </div>
                <div class="input-field col l12 m12 s12">
                    <?php 
                        echo "<input type='text' name='email'value=$email>";
                    ?>
                    <label for="email">Email</label>
                </div>
                <div class="input-field col l12 m12 s12">
                    <input type="password" name="senha">
                    <label for="senha">Senha Atual</label>
                </div>
                <div class="input-field col l12 m12 s12">
                    <input type="password" name="nsenha">
                    <label for="novaSenha">Nova Senha</label>
                </div>
                <div class="input-field col l12 m12 s12">
                    <input type="password" name="con_senha">
                    <label for="confirmaSenha">Confirmar Senha</label>
                </div>
            </div>
        </div>
        <div class="botao02 center">
            <button type="submit" value="0" id="salvarPerfil" class="btn">Salvar</button>
            <a href="perfil.php" id="descartePerfil" class="btn">Descartar Alterações</a>
        </div>
        </form>
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
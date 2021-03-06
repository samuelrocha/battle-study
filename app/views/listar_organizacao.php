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

    if ($_SESSION['logado'] == 1 && $_SESSION['adm'] == 1) {
        
    } else {
        header("Location: ../views/login.php");
        exit;
    }

    $con = new \app\controllers\OrganizacaoCTR();
    $organizacoes = $con->ConsultarOrganizacao();

    foreach ($organizacoes as $key => $chave) {
        $i = $key;
        foreach ($organizacoes[$i] as $chave) {
            $organizacao[$i][] = $chave;
        }
    }

?>
<html lang="pt-BR">

<head>
    <title>Listar Organização - BattleStudy</title>
    <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
    <link rel="icon" href="imgs/icone/Hydra.png">
    <link href="css/all.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/fonte.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/nav.css">
    <link type="text/css" rel="stylesheet" href="css/indexdashboard.css">
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
                        <a href="admin.php" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png"
                                id="logoSite" class="responsive-img"></a>
                    </div>
                    <ul class="right menu">
                        <li>
                            <a href="admin.php" class="white-text textoMenu">Início</a>
                        </li>
                        <li>
                            <a href="#" class="white-text textoMenu">Cadastrar</a>
                            <ul>
                                <li><a href="cadastro_questao.php">Questões</a></li>
                                <li><a href="cadastro_organizacao.php">Organizações</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="white-text textoMenu">Editar</a>
                            <ul>
                                <li><a href="editar_questao.php">Questões</a></li>
                                <li><a href="editar_organizacao.php">Organizações</a></li>
                                <li><a href="editar_usuario.php">Usuários</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="white-text textoMenu">Remover</a>
                            <ul>
                                <li><a href="remover_questao.php">Questões</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" class="white-text textoMenu">Listar</a>
                            <ul>
                                <li><a href="listar_questao.php">Questões</a></li>
                                <li><a href="listar_organizacao.php">Organizações</a></li>
                                <li><a href="listar_usuario.php">Usuários</a></li>
                            </ul>
                        </li>
                        <li>
                            <form action="../logic/login.php" method="post">
                                <input type="submit" name="botao" class="white-text textoMenu" id="Sair" value="Sair">
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <nav class="navSite02">
                <ul id="slide-out" class="sidenav">
                    <div class="menuOverflow">
                        <li><a class="subheader"><i class="fas fa-cog left"></i>Opções</a></li>
                        <li><a href="admin.php">Início</a></li>
                        <li>
                            <form action="../logic/login.php" method="post"> <a> <input type="submit" name="botao" class="black-text" id=Sair value="Sair"> </a> </form>
                        </li>
                        <li>
                            <div class="divider"></div>
                        </li>
                        <li><a class="subheader"><i class="fas fa-save left"></i>Cadastrar</a></li>
                        <li><a class="waves-effect" href="cadastro_questao.php">Questões</a></li>
                        <li><a class="waves-effect" href="cadastro_organizacao.php">Organizações</a></li>
                        <li>
                            <div class="divider"></div>
                        </li>
                        <li><a class="subheader"><i class="fas fa-pen left"></i>Editar</a></li>
                        <li><a class="waves-effect" href="editar_questao.php">Questões</a></li>
                        <li><a class="waves-effect" href="editar_organizacao.php">Organizações</a></li>
                        <li><a class="waves-effect" href="editar_usuario.php">Usuários</a></li>
                        <li>
                            <div class="divider"></div>
                        </li>
                        <li><a class="subheader"><i class="fas fa-trash-alt left"></i>Remover</a></li>
                        <li><a class="waves-effect" href="remover_questao.php">Questões</a></li>
                        <li>
                            <div class="divider"></div>
                        </li>
                        <li><a class="subheader"><i class="fas fa-user-friends left"></i>Listar</a></li>
                        <li><a class="waves-effect" href="listar_questao.php">Questões</a></li>
                        <li><a class="waves-effect" href="listar_organizacao.php">Organizações</a></li>
                        <li><a class="waves-effect" href="listar_usuario.php">Usuários</a></li>
                        <li>
                            <div class="divider"></div>
                        </li>
                    </div>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="fas fa-bars"></i></a>
                <div class="nav-wrapper container"></a>
                    <a href="admin.php" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png"
                            id="logoSite" class="responsive-img"></a> </div>
            </nav>
        </div>
    </div>
    <div class="row container conteudo">
        <div class="col l12 s12 m12">
            <div id="total" class="row">
                <div class="col l12 s12 m12 input-field">
                        <table class="striped">
                <thead>
                  <tr>
                      <th>Id</th>
                      <th>Nome</th>
                      <th>Status</th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                  
                  foreach ($organizacao as list($a ,$b, $c)) {
                    echo "<tr>";
                    echo "<td>$a</td>";
                    echo "<td>$b</td>";
                    echo "<td>$c</td>";
                    echo "</tr>";
                  } 

                ?>
                  
                </tbody>
              </table>
        </div>
            </div>
        </div>
    </div>
    <script>
        M.AutoInit();
        $('#textarea1').val('New Text');
        M.textareaAutoResize($('#textarea1'));
    </script>
</body>

</html>
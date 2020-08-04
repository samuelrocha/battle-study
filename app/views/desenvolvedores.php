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

?>
<html lang="pt-BR">
<head>
    <link rel="shortcut icon" href="imgs/icone/Hydra.ico" type="image/x-icon" >
    <link rel="icon" href="imgs/icone/Hydra.png">
    <link href="css/all.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/fonte.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/nav.css">
    <link type="text/css" rel="stylesheet" href="css/paginadevelopers.css">
    <script src="js/materialize.js"></script>
    <script src="js/materialize.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="js/jquery-3.4.1.js"></script>
    <meta charset="UTF-8">
    <title>BattleStudy - Desenvolvedores</title>
</head>
<body>
    <div class="row header">
        <div class="col l12 m12 s12">
            <nav class="navSite01">
                <div class="col s12">
                    <div class="nav-wrapper container"></a>
                        <a href="index.html" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png"
                            id="logoSite" class="responsive-img"></a>
                        </div>
                        <ul class="right">
                            <li><a href="javascript:history.back()" class="white-text flow-text">Voltar</a></li>
                        </ul>
                    </div>
                </nav>
            </div>
            <nav class="navSite02">
                <ul id="slide-out" class="sidenav">
                    <li><a class="subheader">Opções</a></li>
                    <li><a href="javascript:history.back()">Voltar</a></li>
                </ul>
                <a href="#" data-target="slide-out" class="sidenav-trigger" id="iconeMenu"><i class="fas fa-bars"></i></a>
                <div class="nav-wrapper container"></a>
                    <a href="index.html" class="brand-logo blue-text"><img src="imgs/logo/logo-fundo-colorido.png"
                        id="logoSite" class="responsive-img"></a> </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Fim do Nav -->
    <div class="row container">
        <div class="col l12 s12 m12 tituloDesenvolvedor"><span id="tituloDesenvolvedores">Desenvolvedores</span></div>
        <div class="col l12 s12 m12">
            <div class="row desenvolvedore">
                <div class="col l2 m6 s12 espacoDesenvolvedor">
                    <img src="imgs/victor.jpeg" class="circle fotoDesenvolvedores">
                    <div class="col l12 s12 m12 nomeDesenvolvedores">
                        <span class="nomeDesenvolvedor">Victor</span>
                    </div>
                    <div class="col l12 s12 m12 funcaoDesenvolvedores">
                        <span class="funcaoDesenvolvedor">Pesquisador</span>
                    </div>
                </div>
                <div class="col l2 m6 s12 espacoDesenvolvedor">
                    <img src="imgs/keven.jpeg" class="circle fotoDesenvolvedores">
                    <div class="col l12 s12 m12 nomeDesenvolvedores">
                        <span class="nomeDesenvolvedor">Keven</span>
                    </div>
                    <div class="col l12 s12 m12 funcaoDesenvolvedores">
                        <span class="funcaoDesenvolvedor">Designer de Interfaces</span>
                    </div>
                </div>
                <div class="col l2 m6 s12 espacoDesenvolvedor">
                    <img src="imgs/samuel.jpeg" class="circle fotoDesenvolvedores">
                    <div class="col l12 s12 m12 nomeDesenvolvedores">
                        <span class="nomeDesenvolvedor">Samuel</span>
                    </div>
                    <div class="col l12 s12 m12 funcaoDesenvolvedores">
                        <span class="funcaoDesenvolvedor">Desenvolvedor Back End</span>
                    </div>
                </div>
                <div class="col l2 m6 s12 espacoDesenvolvedor">
                    <img src="imgs/lucas.jpeg" class="circle fotoDesenvolvedores">
                    <div class="col l12 s12 m12 nomeDesenvolvedores">
                        <span class="nomeDesenvolvedor">Lucas</span>
                    </div>
                    <div class="col l12 s12 m12 funcaoDesenvolvedores">
                        <span class="funcaoDesenvolvedor">Desenvolvedor Front End</span>
                    </div>
                </div>
                <div class="col l2 m6 s12 espacoDesenvolvedor">
                    <img src="imgs/vinicius.jpeg" class="circle fotoDesenvolvedores">
                    <div class="col l12 s12 m12 nomeDesenvolvedores">
                        <span class="nomeDesenvolvedor">Vinicius</span>
                    </div>
                    <div class="col l12 s12 m12 funcaoDesenvolvedores">
                        <span class="funcaoDesenvolvedor">DBA / Documentação</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    M.AutoInit();
</script>
</body>
</html>
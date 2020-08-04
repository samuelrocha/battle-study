var tempoAtual = -9;
var termino_batalha = false;
var c = 0;
var n = 0;

carregarJogadores();
carregarPontos();
alterarPergunta();
sortearPergunta();
carregarTempo();
setInterval('sortearPergunta()', 1000);
setInterval('verificarFimBatalha()', 1000);
setInterval('carregarTempo()', 1000);
setInterval('alterarTempo()', 1000);
setInterval('carregarJogadores()', 5000);

// Função para carregar jogadores

function carregarJogadores() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var jogadores2 = JSON.parse(this.responseText);
      for(i=1; i <= 12; i++){
        if(jogadores2[0]['total'] > (i-1) ){
          document.getElementById("bloco"+i).style.display="";
          document.getElementById("nickname"+i).innerHTML = jogadores2[i-1]['nick'];
          document.getElementById("pontuacao"+i).innerHTML = jogadores2[i-1]['pontos'];
          document.getElementById("result").innerHTML = jogadores2[i-1]['pontos2'];
          document.getElementById("org"+i).innerHTML = jogadores2[i-1]['organizacao'];
          if(jogadores2[i-1]['organizacao'] == 'Esparta'){
            document.getElementById("imagem"+i).innerHTML = "<img src='imgs/icone/esparta2.jpg' class='responsive-img circle' class='imagem'>";
          }else{
            document.getElementById("imagem"+i).innerHTML = "<img src='imgs/icone/atenas2.jpg' class='responsive-img circle' class='imagem'>";
          }
        }else{
          document.getElementById("bloco"+i).style.display="none";
        }
      }
      for(i=13; i <= 24; i++){
        if(jogadores2[0]['total'] > (i-13) ){
          document.getElementById("bloco"+i).style.display="";
          document.getElementById("nickname"+i).innerHTML = jogadores2[i-13]['nick'];
          document.getElementById("pontuacao"+i).innerHTML = jogadores2[i-13]['pontos'];
          document.getElementById("result").innerHTML = jogadores2[i-13]['pontos2'];
          document.getElementById("org"+i).innerHTML = jogadores2[i-13]['organizacao'];
          if(jogadores2[i-13]['organizacao'] == 'Esparta'){
            document.getElementById("imagem"+i).innerHTML = "<img src='imgs/icone/esparta2.jpg' class='responsive-img circle' class='imagem'>";
          }else{
            document.getElementById("imagem"+i).innerHTML = "<img src='imgs/icone/atenas2.jpg' class='responsive-img circle' class='imagem'>";
          }
        }else{
          document.getElementById("bloco"+i).style.display="none";
        }
      }
    }
  };
  xhttp.open("POST", "../logic/jogador_batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("botao=carregarJogadores");   
}

// Função para carregar pontos

function carregarPontos() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var pontos = JSON.parse(this.responseText);
      result.innerHTML = pontos['pontos'];
    }
  };
  xhttp.open("POST", "../logic/jogador_batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("botao=carregarPontos");   
}

// Função para responder as perguntas

function responder(resposta) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var jogadores2 = JSON.parse(this.responseText);
      for(i=1; i <= 12; i++){
        if(jogadores2[0]['total'] > (i-1) ){
          document.getElementById("bloco"+i).style.display="";
          document.getElementById("nickname"+i).innerHTML = jogadores2[i-1]['nick'];
          document.getElementById("pontuacao"+i).innerHTML = jogadores2[i-1]['pontos'];
          document.getElementById("result").innerHTML = jogadores2[i-1]['pontos2'];
          document.getElementById("org"+i).innerHTML = jogadores2[i-1]['organizacao'];
          if(jogadores2[i-1]['organizacao'] == 'Esparta'){
            document.getElementById("imagem"+i).innerHTML = "<img src='imgs/icone/esparta2.jpg' class='responsive-img circle' class='imagem'>";
          }else{
            document.getElementById("imagem"+i).innerHTML = "<img src='imgs/icone/atenas2.jpg' class='responsive-img circle' class='imagem'>";
          }
        }else{
          document.getElementById("bloco"+i).style.display="none";
        }
      }
      for(i=13; i <= 24; i++){
        if(jogadores2[0]['total'] > (i-13)){
          document.getElementById("bloco"+i).style.display="";
          document.getElementById("nickname"+i).innerHTML = jogadores2[i-13]['nick'];
          document.getElementById("pontuacao"+i).innerHTML = jogadores2[i-13]['pontos'];
          document.getElementById("result").innerHTML = jogadores2[i-13]['pontos2'];
          document.getElementById("org"+i).innerHTML = jogadores2[i-13]['organizacao'];
          if(jogadores2[i-13]['organizacao'] == 'Esparta'){
            document.getElementById("imagem"+i).innerHTML = "<img src='imgs/icone/esparta2.jpg' class='responsive-img circle' class='imagem'>";
          }else{
            document.getElementById("imagem"+i).innerHTML = "<img src='imgs/icone/atenas2.jpg' class='responsive-img circle' class='imagem'>";
          }
        }else{
          document.getElementById("bloco"+i).style.display="none";
        }
      }
 
      // Inserir aqui as modificaçoes de cor do objeto clicado

      n = jogadores2[0]['resposta'];
      
      if(jogadores2[0]['cor'] == 'vermelho'){
        document.getElementById("pintar"+n).classList.remove("alternativas");
        document.getElementById("pintar"+n).classList.add("erroQuestao");
      }else{
        document.getElementById("pintar"+n).classList.remove("alternativas");
        document.getElementById("pintar"+n).classList.add("acertoQuestao");
      }      
      
    }
  };
  xhttp.open("POST", "../logic/jogador_batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("botao=responder&resposta="+resposta);   
}

// Metodo para bloquear as perguntas

function alterarPergunta() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var questao2 = JSON.parse(this.responseText);
      pergQuestao.innerHTML = questao2['pergunta'];
      alternativa_a.innerHTML = questao2['alternativa_a'];
      alternativa_b.innerHTML = questao2['alternativa_b'];
      alternativa_c.innerHTML = questao2['alternativa_c'];
      alternativa_d.innerHTML = questao2['alternativa_d'];
      alternativa_e.innerHTML = questao2['alternativa_e'];
      document.getElementById("numQuestao").innerHTML = "QUESTÃO";
      document.getElementById("pintar"+n).classList.remove("erroQuestao");
      document.getElementById("pintar"+n).classList.remove("acertoQuestao");
      document.getElementById("pintar"+n).classList.add("alternativas");
    }
  };
  xhttp.open("POST", "../logic/jogador_batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send("botao=requerir");   
}

// Função que carrega novas perguntas

function sortearPergunta() {
  if(tempoAtual == -3){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        responder();
        setTimeout('alterarPergunta()', 4500);
        if (termino_batalha == true){
          setTimeout('fimBatalha()', 4000);
        }
      }
    };
    xhttp.open("POST", "../logic/jogador_batalha.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('botao=sortear');
  }
}

// Verifica de a partida foi encerrada

function verificarFimBatalha() {
  if(tempoAtual == 0){
    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var final_batalha2 = JSON.parse(this.responseText);
        termino_batalha = final_batalha2;
        document.getElementById("numQuestao").innerHTML = "ESPERANDO PRÓXIMA RODADA";
      }
    };
    xhttp.open("POST", "../logic/jogador_batalha.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send('botao=verificarFimBatalha');  
  }
}

// Carrega o tempo para todos usuarios

function carregarTempo() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var controlador2 = JSON.parse(this.responseText);
      tempoJogador.innerHTML = controlador2['exibir'];
      tempoAtual = controlador2['tempo'];
      if(tempoAtual == 0){
        carregarJogadores();
      }
    }
  };
  xhttp.open("POST", "../logic/batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('botao=carregarTempo');   
}

// Subtrai o tempo

function alterarTempo() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    }
  };
  xhttp.open("POST", "../logic/batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('botao=alterarTempo');   
}

// Caso o tempo não se altere o host atual será desconectado

function desbugarTempo() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {

    }
  };
  xhttp.open("POST", "../logic/jogador_batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('botao=desbugarTempo');   
}

function fimBatalha() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = "home.php";
    }
  };
  xhttp.open("POST", "../logic/jogador_batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('botao=fimBatalha');   
}

function sair() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      window.location.href = "home.php";
    }
  };
  xhttp.open("POST", "../logic/jogador_batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('botao=Sair');   
}

window.addEventListener("beforeunload", function(event) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
    }
  };
  xhttp.open("POST", "../logic/jogador_batalha.php", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send('botao=Sair'); 
});

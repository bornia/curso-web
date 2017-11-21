var timerId = null; //variável que armazena a chamada da função timeout

function iniciaJogo(){

	// Pega apenas a query da url, isto é, a partir do ponto de interrogação
	var url = window.location.search;
	
	// Retira os pontos de interrogação que existem na url
	var nivel_jogo = url.replace("?", "");

	// Tempo de jogo
	var tempo_segundos = 0;

	// Tempo de jogo depende do nível de jogo
	if(nivel_jogo == 1) { //1 fácil -> 120segundos
		tempo_segundos = 120;
	}

	if(nivel_jogo == 2) { //2 normal -> 60segundos
		tempo_segundos = 60;
	}
	
	if(nivel_jogo == 3) { //3 difícil -> 30segundos
		tempo_segundos = 30;
	}

	//inserindo segundos no span
	document.getElementById('cronometro').innerHTML = tempo_segundos;

	// quantidade de balões
	var qtde_baloes = 80;
	
	cria_baloes(qtde_baloes);

	//imprimir qtde baloes inteiros
	document.getElementById('baloes_inteiros').innerHTML = qtde_baloes;

	// Inicialmente não tem nenhum balão estourado
	document.getElementById('baloes_estourados').innerHTML = 0;

	contagem_tempo(tempo_segundos + 1)
}

function contagem_tempo(segundos){

	segundos = segundos - 1;

	if(segundos == -1){
		parar_jogo(); //para a execução da função do settimeout
		game_over();
		return false;
	}

	// Atualiza os segundos no HTML
	document.getElementById('cronometro').innerHTML = segundos;

	// Executa a função contagem_tempo() a cada 1 segundo
	timerId = setTimeout("contagem_tempo("+segundos+")", 1000);
}

function game_over(){
	remove_eventos_baloes();
	alert('Fim de jogo, você não conseguiu estourar todos os balões a tempo');
}

function cria_baloes(qtde_baloes){

	for(var i = 1; i <= qtde_baloes; i++){

		// Cria um elemento img
		var balao = document.createElement("img");

		// src do elemento img
		balao.src = 'imagens/balao_azul_pequeno.png';

		// Margem dos balões
		balao.style.margin = '10px';

		// id dos balões; diferente pra cada um
		balao.id = 'b'+i;

		// Atribui um evento onclick ao balão
		balao.onclick = function(){ estourar(this); };

		// Adiciona o balão dentro da div
		document.getElementById('cenario').appendChild(balao);
	}
}

function estourar(e){

	// Recupera o id do balão
	var id_balao = e.id;

	// Retira o evento de onclick do balão; evita múltiplos pontos com um mesmo balão
	document.getElementById(id_balao).setAttribute("onclick", "");

	// Muda a imagem do balão
	document.getElementById(id_balao).src = 'imagens/balao_azul_pequeno_estourado.png';

	pontuacao(-1);
}

function pontuacao(acao){

	// Recupera a pontuação do jogador no HTML
	var baloes_inteiros = document.getElementById('baloes_inteiros').innerHTML;
	var baloes_estourados  = document.getElementById('baloes_estourados').innerHTML;

	// Transforma em números
	baloes_inteiros = parseInt(baloes_inteiros);
	baloes_estourados = parseInt(baloes_estourados);

	// 1 balão estourado = -1 balão inteiro
	baloes_inteiros = baloes_inteiros + acao;
	baloes_estourados = baloes_estourados - acao;

	// Atrualiza a pontuação no HTML
	document.getElementById('baloes_inteiros').innerHTML = baloes_inteiros;
	document.getElementById('baloes_estourados').innerHTML = baloes_estourados;

	situacao_jogo(baloes_inteiros);
}

function situacao_jogo(baloes_inteiros){
	if(baloes_inteiros == 0){
		alert('Parabéns, você conseguiu estourar todos os balões a tempo');
		parar_jogo();
	}
}

function remove_eventos_baloes() {
    var i = 1; //contado para recuperar balões por id
    
    //percorre o lementos de acordo com o id e só irá sair do laço quando não houver correspondência com elemento
    while(document.getElementById('b'+i)) {
        //retira o evento onclick do elemnto
        document.getElementById('b'+i).onclick = '';
        i++; //faz a iteração da variávei i
    }
}

function parar_jogo(){
	clearTimeout(timerId);
}
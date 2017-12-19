<?php

session_start();

// Evita que alguém acesse uma página restrita, isto é, só quem fez login tem acesso
if(!isset($_SESSION['usuario'])) {
	header('Location: index.php?erro=2');
}

?>

<!DOCTYPE HTML>
<html lang="pt-br">
	<head>
		<meta charset="UTF-8">

		<title>Twitter clone</title>
		
		<!-- jquery - link cdn -->
		<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

		<!-- bootstrap - link cdn -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

		<script type="text/javascript">
			$(document).ready(function() {

				/** Associa o evento de clique ao botão de Procurar */
				$('#btn_procurar_pessoa').click(function () {
					// Verifica se o nome não está em branco
					if ($('#nome_pessoa').val().length > 0) {
						// Obtém a(s) pessoa(s) procurada(s)
						$.ajax({
							url: 'get_pessoas.php',
							type: 'POST',
							data: $('#form_procurar_pessoas').serialize(),
							success: function (data) {
								// Limpa o campo de busca
								$('#nome_pessoa').val('');

								// Imprime o resultado da busca
								$('#pessoas').html(data);

								/** Evento para seguir usuário */
								$('.btn_seguir').click(function() {
									// Obtém o id do usuário a ser seguido
									var id_usuario = $(this).data('id_usuario');
									
									// Adiciona seguidores
									$.ajax({
										url: 'seguir.php',
										type: 'POST',
										data: {seguir_id_usuario: id_usuario}
									});

									// Troca botão "Seguir" por "Deixar de Seguir"
									$('#' + this.id).hide();
									$('#btn_deixar_seguir_' + id_usuario).show();
								});

								/** Evento para deixar de seguir usuário */
								$('.deixar_btn_seguir').click(function() {
									// Obtém o id do usuário a ser seguido
									var id_usuario = $(this).data('id_usuario');
									
									// Retira seguidores
									$.ajax({
										url: 'deixar_seguir.php',
										type: 'POST',
										data: {deixar_seguir_id_usuario: id_usuario}
									});

									// Troca botão "Deixar de Seguir" por "Seguir"
									$('#' + this.id).hide();
									$('#btn_seguir_' + id_usuario).show();
								});
							}
						});			
					}
				});

				/** Atualiza a quantidade de seguidores no painel */
				function atualiza_painel_seguidores() {
					$.ajax({
						url: 'get_qtd_seguidores.php',
						type: 'POST',
						success: function(data) {
							$('#qtd_seguidores').html(data);
						}
					});
				}

				/** Atualiza a quantidade de tweets no painel */
				function atualiza_painel_tweet() {
					$.ajax({
						url: 'get_qtd_tweets.php',
						success: function(data) {
							$('#qtd_tweets').html(data);
						}
					});
				}

				atualiza_painel_seguidores();
				atualiza_painel_tweet();
			});
		</script>
	
	</head>

	<body>

		<!-- Static navbar -->
	    <nav class="navbar navbar-default navbar-static-top">
	      <div class="container">
	        <div class="navbar-header">
	          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
	            <span class="sr-only">Toggle navigation</span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	            <span class="icon-bar"></span>
	          </button>
	          <img src="imagens/icone_twitter.png" />
	        </div>
	        
	        <div id="navbar" class="navbar-collapse collapse">
	          <ul class="nav navbar-nav navbar-right">
	            <li><a href="home.php">Home</a></li>
	            <li><a href="sair.php">Sair</a></li>
	          </ul>
	        </div><!--/.nav-collapse -->
	      </div>
	    </nav>


	    <div class="container">
	    	
	    	<br /><br />

	    	<div class="col-md-3">
	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    				<h4> <?= $_SESSION['usuario']; ?> </h4>

	    				<hr/>

	    				<div class="col-md-6">
	    					TWEETS <br/> <span id="qtd_tweets"> </span>
	    				</div>

	    				<div class="col-md-6">
	    					SEGUIDORES <br/> <span id="qtd_seguidores"> </span>
	    				</div>
	    			</div>
	    		</div>	
	    	</div>

	    	<div class="col-md-6">
	    		<div class="panel panel-default">
	    			<div class="panel-body">
	    				<form id="form_procurar_pessoas" class="input-group">
	    					<input id="nome_pessoa" type="text" name="nome_pessoa" class="form-control" placeholder="Quem você está procurando?" maxlength="140" />
	    					<span class="input-group-btn">
	    						<button type="button" id="btn_procurar_pessoa" class="btn btn-default"> Procurar </button>
	    					</span>
	    				</form>
	    			</div>
	    		</div>

	    		<div id="pessoas" class="list-group"> </div>
	    	</div>

			<div class="col-md-3">
				<div class="panel panel-default">
					<div class="panel-body"> </div>
				</div>
			</div>
		</div>


	    </div>
	
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	
	</body>
</html>

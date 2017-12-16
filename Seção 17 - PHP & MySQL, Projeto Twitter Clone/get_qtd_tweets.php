<?php

// Evita que alguém acesse uma página restrita, isto é, só quem fez login tem acesso
if(!isset($_SESSION['usuario'])) {
	header('Location: index.php?erro=2');
}
else {
	require_once('db.class.php');

	// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
	$con = (new db())->conecta_mysql();

	// Prepara a query
	$sql = "SELECT COUNT(*) AS qtd_tweets FROM tweet WHERE id_usuario = " . $_SESSION['id_usuario'] . ";";

	// Executa e verifica se a query foi executada
	if($res = mysqli_query($con, $sql)) {
		$data = mysqli_fetch_array($res, MYSQLI_ASSOC);
		return $data['qtd_tweets'];
	}
	else {
		return 'Erro ao consultar quantidade de tweets.';
	}
}

?>
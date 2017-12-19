<?php

session_start();

// Evita que alguém acesse uma página restrita, isto é, só quem fez login tem acesso
if(!isset($_SESSION['usuario'])) {
	header('Location: index.php?erro=2');
}
else {
	require_once('db.class.php');

	// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
	$con = (new db())->conecta_mysql();

	// Prepara a query
	$sql = "DELETE FROM tweet WHERE id_tweet = " . $_POST['id_btn_exclui_tweet'] . ";";

	// Verifica e executa a query
	if(!mysqli_query($con, $sql)) {
		echo 'Erro ao excluir tweet';
	}
	else {
		echo $_POST['id_btn_exclui_tweet'];
	}
}

?>
<?php

session_start();

// Verifica se o usuário fez login para ter acesso a página e se foi feita uma requisição
if(!(isset($_SESSION['usuario']) || isset($_POST['seguir_id_usuario']))) {
	header('Location: index.php?erro=3');
}
else {
	// Organiza as informações do usuário seguidor e de quem será seguido
	$user_infos[] = $_SESSION['id_usuario'];
	$user_infos[] = $_POST['seguir_id_usuario'];

	require_once('db.class.php');

	// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
	$con = (new db())->conecta_mysql();

	// Prepara a query
	$sql = "INSERT INTO usuarios_seguidores (id_usuario, seguindo_id_usuario) VALUES ($user_infos[0], $user_infos[1]);";

	// Executa e finaliza a aplicação se a query foi falhou
	mysqli_query($con, $sql) or die('Erro ao seguir o usuário.');
}

?>
<?php

session_start();

// Verifica se o usuário fez login para ter acesso a página e se foi feita uma requisição
if(!(isset($_SESSION['usuario']) || isset($_POST['deixar_seguir_id_usuario']))) {
	header('Location: index.php?erro=2');
}
else {
	// Organiza as informações do usuário seguidor e de quem deixará de ser seguido
	$user_infos = array($_SESSION['id_usuario'], $_POST['deixar_seguir_id_usuario']);

	require_once('db.class.php');

	// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
	$con = (new db())->conecta_mysql();

	// Prepara a query
	$sql = "DELETE FROM usuarios_seguidores WHERE id_usuario = $user_infos[0] AND seguindo_id_usuario = $user_infos[1];";

	// Executa e finaliza a aplicação se a query foi falhou
	mysqli_query($con, $sql) or die('Erro ao deixar de seguir usuário.');
}
?>
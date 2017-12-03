<?php

require_once('db.class.php');

// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
$con = (new db())->conecta_mysql();

// Organiza as informações do novo usuário
$user_infos = array($_POST['usuario'], $_POST['email'], $_POST['senha']);

// Prepara a query
$sql = "INSERT INTO usuarios (usuario, email, senha) VALUES ('$user_infos[0]', '$user_infos[1]', '$user_infos[2]');";

// Executa e verifica se a query foi executada com sucesso
if(!mysqli_query($con, $sql)) {
	exit('Erro ao cadastrar novo usuário!');
}

?>

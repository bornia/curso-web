<?php
	
session_start();

// Evita que alguém acesse uma página restrita, isto é, só quem fez login tem acesso
if (!isset($_SESSION['usuario'])) header('Location: index.php');

require_once('db.class.php');

// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
$con = (new db())->conecta_mysql();

$user_infos = array($_POST['nome_pessoa'], $_SESSION['id_usuario']);

// Prepara a query
$sql = "SELECT * FROM usuarios WHERE usuario LIKE '%$user_infos[0]%' AND id <> $user_infos[1];";

// Verifica se a query foi executada com sucesso
if ($res = mysqli_query($con, $sql)) {
	// Varre a tabela usuarios
	while ($data = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
		echo
			"<a href='#' class='list-group-item'> " .
				"<strong> " . $data['usuario'] . " </strong> " . 
				"<small> " . $data['email'] . " </small> " .
			"</a>";
	}
}
else {
	die('Erro na consulta por usuários no banco de dados.');
}
?>
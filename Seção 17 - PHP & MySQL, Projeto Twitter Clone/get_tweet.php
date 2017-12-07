<?php

session_start();

// Evita que alguém acesse uma página restrita, isto é, só quem fez login tem acesso
if(!isset($_SESSION['usuario'])) header('Location: index.php?erro=2');

require_once('db.class.php');

// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
$con = (new db())->conecta_mysql();

// Prepara a query
$sql = 'SELECT * FROM tweet WHERE id_usuario = ' . $_SESSION['id_usuario'] . ' ORDER BY data_inclusao DESC;';

// Executa a query
$res = mysqli_query($con, $sql) or die('Erro na consulta de tweets do banco de dados.');

// Varre a tabela tweets
while ($data = mysqli_fetch_array($res, MYSQLI_ASSOC)) {
	var_dump($data);
	echo '<br/> <br/>';
}

?>
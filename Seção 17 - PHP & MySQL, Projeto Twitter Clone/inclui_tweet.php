<?php

session_start();

// Evita que alguém acesse uma página restrita, isto é, só quem fez login tem acesso
if(!isset($_SESSION['usuario'])) header('Location: index.php?erro=2');

require_once('db.class.php');

// Organiza as informações do usuário que postou o tweet
$user_infos = array($_SESSION['id_usuario'], $_POST['texto_do_tweet']);

//// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
$con = (new db())->conecta_mysql();

// Prepara a query
$sql = "INSERT INTO tweet (id_usuario, tweet) VALUES ($user_infos[0], '$user_infos[1]');";

// Executa a query
$res = mysqli_query($con, $sql) or die(mysqli_error($con));

?>
<?php

require_once('db.class.php');

$user = array($_POST['usuario'], $_POST['senha']);

// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
$con = (new db())->conecta_mysql();

// Prepara a query
$sql = "SELECT usuario, senha FROM usuarios WHERE usuario = '$user[0]' AND senha = '$user[1]';";

// Executa a query
$res = mysqli_query($con, $sql) or die(mysqli_error($con));

// Transforma o resultado da consulta em array
$data = mysqli_fetch_array($res, MYSQLI_ASSOC);

// Verifica se a consulta retornou algum usuário (!= NULL)
if(isset($data)) {
	echo "Usuário existe.";
} else {
	// Redireciona para outra página passando um parâmetro
	header('Location: index.php?erro=1');
}

?>
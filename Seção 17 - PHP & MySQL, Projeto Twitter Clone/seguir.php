<?php

session_start();

if(!isset($_SESSION['usuario'])) header('Location: index.php?erro=2');

require_once('db.class.php');

$con = (new db())->conecta_mysql();

$user_infos = array($_SESSION['id_usuario'], $_POST['seguir_id_usuario']);

$sql = "INSERT INTO usuarios_seguidores (id_usuario, seguindo_id_usuario) VALUES ($user_infos[0], $user_infos[1]);";

if (!mysqli_query($con, $sql)) {
	alert('Erro ao seguir o usuário.');
}


?>
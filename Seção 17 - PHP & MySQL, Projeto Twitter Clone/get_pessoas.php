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
				"<p class='list-group-item-text pull-right'> " .
					"<button type='button' id='btn_seguir_".$data['id']."' class='btn btn-default btn_seguir' data-id_usuario='".$data['id']."'> " .
						"Seguir " .
					"</button> " .
					"<button type='button' id='btn_deixar_seguir_".$data['id']."' class='btn btn-primary deixar_btn_seguir' data-id_usuario='".$data['id']."' style='display: none;'> " .
						"Deixar de Seguir " .
					"</button> " .
				"</p> " .
				"<div class='clearfix'> </div> " .
			"</a>";
	}
}
else {
	die('Erro na consulta por usuários no banco de dados.');
}
?>
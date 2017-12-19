<?php

session_start();

// Evita que alguém acesse uma página restrita, isto é, só quem fez login tem acesso
if(!isset($_SESSION['usuario'])) header('Location: index.php?erro=2');

require_once('db.class.php');

// Instancia a classe db para executar o seu método e fazer a conexão com o banco de dados
$con = (new db())->conecta_mysql();

// Prepara a query
$sql = "SELECT tweet, DATE_FORMAT(data_inclusao, '%d %b %Y %T') AS data_inclusao_formatada, usuario, id_usuario, id_tweet FROM tweet AS t JOIN usuarios AS u ON (t.id_usuario = u.id) WHERE id_usuario = " . $_SESSION['id_usuario'] . " OR id_usuario IN (SELECT seguindo_id_usuario FROM usuarios_seguidores WHERE id_usuario = " . $_SESSION['id_usuario'] . ") ORDER BY data_inclusao DESC;";

// Executa a query
$res = mysqli_query($con, $sql) or die('Erro na consulta de tweets do banco de dados.');

// Varre a tabela tweets
while ($data = mysqli_fetch_array($res, MYSQLI_ASSOC)) {

	$html =  
		"<div id='tweet_".$data['id_tweet']."' class='list-group-item'> " .
			"<h4 class='list-group-item-heading'> " .
				$data['usuario'] . " <small> " . $data['data_inclusao_formatada'] . " </small> ";

				if($data['id_usuario'] == $_SESSION['id_usuario']) {
					$html .= "<small> <button type='button' class='pull-right btn_excluir_tweet' data-id_tweet='".$data['id_tweet']."' style='background: none; border: none;'> <span> &times; </span> </button> </small> ";
				}
	$html .=
			"</h4>" . 
			"<p class='list-group-item-text'>" . $data['tweet'] . " </p>" .
		"</div>";

	echo $html;
}

?>
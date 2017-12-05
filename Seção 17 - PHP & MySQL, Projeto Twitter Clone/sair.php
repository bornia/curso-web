<?php
	session_start();

	// Apaga os índices da seção
	foreach ($_SESSION as $key => $value) unset($_SESSION[$key]);

	echo 'Logout efetuado com sucesso!';

	// Redireciona para uma página após 2 segundos
	header('Refresh: 2, url= index.php');
?>
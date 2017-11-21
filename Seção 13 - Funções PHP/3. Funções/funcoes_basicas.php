<?php

	// Se $_POST['nome'] existe e ele está vazio
	if(isset($_POST['nome']) && empty($_POST['nome'])) {
		echo '<p>' . 'O nome está em branco. Preencha com seu nome.' . '</p>';
	}

	// Se $_POST['cpf'] existe e ele está vazio
	if(isset($_POST['cpf']) && empty($_POST['cpf'])) {
		echo '<p>' . 'O cpf está em branco. Preencha com seu cpf.' . '</p>';
	}

	// Se $_POST['cpf'] existe e ele não é número
	if(isset($_POST['cpf']) && !is_numeric($_POST['cpf'])) {
		echo '<p>' . 'O cpf deve conter apenas números.' . '</p>';
	}

?>

<form role="form" action="" method="POST">
	<label>
		Nome Completo*:
		<input type="text" name="nome">
	</label>

	<label>
		CPF* :
		<input type="text" name="cpf">
	</label>

	<input type="submit" value="cadastrar">
</form>
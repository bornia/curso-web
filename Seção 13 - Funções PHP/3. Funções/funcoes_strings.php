<?php

	$texto = 'curso completo de PHP';

	// Transforma todos os caracteres em minúsculos
	echo '<p>' . strtolower($texto) . '</p>';

	// Transforma todos os caracteres em maiúsculos
	echo '<p>' . strtoupper($texto) . '</p>';

	// Transforma apenas o primeiro caractere em maiúsculo
	echo '<p>' . ucfirst($texto) . '</p>';

	/* MANIPULAÇÃO DE STRINGS COM FORMULÁRIOS */

	// Validação do cpf
	$cpf = isset($_POST['cpf']) ? $_POST['cpf'] : '';

	if(strlen($cpf) != 11) {
		echo '<p>' . 'CPF inválido.' . '</p>';
	}

?>

<form method="post" action="">
	<label>
		CPF*:
		<input type="text" name="cpf">
	</label>

	<input type="submit" value="cadastrar">
</form>

<?php

	$texto = '001.234.567-89';

	// Tira todos os pontos
	$cpf = str_replace('.', '', $texto);

	// Tira o hífen
	$cpf = str_replace('-', '', $cpf);

	echo "<p> CPF sem pontos e hífen: $cpf </p>";

	/* SUBSTRING */

	$texto = "Saiba porque o seu celular esquenta tanto nas lojas ZZZ às quartas-feiras, a partir do próximo mês.";

	echo '<p>' . substr($texto, 0, 41) . ' ... </p>';

?>
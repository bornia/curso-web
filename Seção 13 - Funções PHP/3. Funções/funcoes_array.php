<p> is_array($var) - verifica se uma variável é um array; Retorna "true" ou "false". </p>

<p> in_array($string, $array) - verifica se um valor existe em um array; Retorna "true" ou "false". </p>

<p> array_keys($array) - retorna todas as chaves de um array. </p>

<p>	sort($array) - Ordena um array; Retorna "true" ou "false".
</p>

<p>
	asort($array) - Ordena um array, mantendo o índice/valor; Retorna "true" ou "false".
</p>

<p>
	count($array) - Retorna a quantidade de elementos que um array tem.
</p>

<p>
	array_merge($array1, $array2<, ...>) - Funde um ou mais arrays; Retorna um array fundido.
</p>

<p>
	explode($str_delimitador, $string) - Divide uma string baseado em um delimitador; Retorna um array com a string dividida.
</p>

<p>
	implode($str_delimitador, $string) - Junta elementos de um array em uma string, separando cada um por um delimitador; Retorna a string de elementos concatenados.
</p>

<p> <hr> </p>

<?php

	/* is_array */
	$array = array();
	// $array = "String";
	$retorno = is_array($array) ? "<p> É um array </p>" : '<p> Não é um array </p>';
	echo $retorno;

	/* in_array */
	$array = array('mac', 'linux', 'windows');
	$retorno = in_array('mac', $array) ? '<p> A string existe no array </p>' : '<p> Não existe a string no array </p>';
	echo $retorno;

	/* array_keys */
	$produtos = array(10 => 'Notebook', 11 => 'Teclado');
	$chaves_produtos = array_keys($produtos);
	echo '<p>';
	var_export($chaves_produtos); // Similar ao var_dump()
	echo '</p>';

	/* sort */
	$frutas = array(0 => 'carambola', 1 => 'amora', 2 => 'banana');
	echo '<p> Antes: ';
	var_export($frutas);
	echo '<br /> Depois: ';
	sort($frutas);
	var_export($frutas);
	echo '</p>';

	/* asort */
	$frutas = array(0 => 'carambola', 1 => 'amora', 2 => 'banana');
	echo '<p> Antes: ';
	var_export($frutas);
	echo '<br /> Depois: ';
	asort($frutas);
	var_export($frutas);
	echo '</p>';

	/* count */
	$frutas = array(0 => 'carambola', 1 => 'amora', 2 => 'banana');
	echo '<p>' . count($frutas) . '</p>';

	/* array_merge */
	$array1 = array('mac', 'linux');
	$array2 = array('windows');
	$array3 = array('solaris');
	$novo_array = array_merge($array1, $array2, $array3);
	echo '<p>';
	var_export($novo_array);
	echo '</p>';

	/* explode */
	$string = '20/10/2020';
	$retorno = explode('/', $string);
	echo '<p>';
	var_export($retorno);
	echo '</p>';

	/* implode */
	$nova_string = implode('/', $retorno);
	echo '<p>' . $nova_string . '</p>';

?>
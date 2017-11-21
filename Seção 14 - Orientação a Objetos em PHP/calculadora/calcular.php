<?php

require_once('classes/Calculadora.php');

$calculadora = new Calculadora();

switch($_POST['operacao']) {
	case 'somar':
		echo (new Calculadora())->somar($_POST['numero1'], $_POST['numero2']);
		break;
	case 'subtrair':
		echo (new Calculadora())->subtrair($_POST['numero1'], $_POST['numero2']);
		break;
	case 'multiplicar':
		echo $calculadora->multiplicar($_POST['numero1'], $_POST['numero2']);
		break;
	case 'dividir':
		echo $calculadora->dividir($_POST['numero1'], $_POST['numero2']);
		break;
}

?>
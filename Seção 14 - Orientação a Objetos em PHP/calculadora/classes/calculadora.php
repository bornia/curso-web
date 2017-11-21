<?php

class Calculadora {
	private $numero1;
	private $numero2;

	public function __construct() {
		$numero1 = 0;
		$numero2 = 0;
	}

	/* GETTERS E SETTERS */

	public function setNumero1($num1) {
		$this->numero1 = $num1;
	}

	private function getNumero1() {
		return $this->numero1;
	}

	public function setNumero2($num2) {
		$this->numero2 = $num2;
	}

	private function getNumero2() {
		return $this->numero2;
	}

	/* OPERAÇÕES */

	public function somar($num1, $num2) {
		return $num1 + $num2;
	}

	public function subtrair($num1, $num2) {
		return $num1 - $num2;
	}

	public function multiplicar($num1, $num2) {
		return $num1 * $num2;
	}

	public function dividir($num1, $num2) {
		return $num1 / $num2;
	}
}

?>
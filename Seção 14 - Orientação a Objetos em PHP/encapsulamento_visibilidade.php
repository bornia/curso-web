<?php

class Veiculo {
	public $placa; // var por padrão é public
	private $cor;
	protected $tipo = 'Caminhonete';

	public function setCor($cor) {
		$this->cor = $cor;
	}

	public function getCor() {
		return $this->cor;
	}
}

$veiculo = new Veiculo();

// Funciona normalmente
$veiculo->placa = 'JAM3636';
echo $veiculo->placa;

/** Fatal error: atributo privado só pode ser alterado de dentro da classe.
$veiculo->cor = 'Azul';
echo $veiculo->cor;
*/

/** Fatal error
$veiculo->tipo = 'Caminhonete';
echo $veiculo->tipo;
*/

class Carro extends Veiculo {
	public function exibirTipo() {
		echo $this->tipo;
	}
}

$carro = new Carro();

$carro->exibirTipo();

?>
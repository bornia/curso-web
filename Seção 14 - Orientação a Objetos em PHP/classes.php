<?php

/**
* Criação da classe
*/
class Pessoa {
	// Atributos
	var $nome;
	var $idade;

	// Construtor
	function __construct($idade) {
		$this->idade = $idade;
	}

	// Métodos
	function setNome($nome_definido) {
		$this->nome = $nome_definido;
	}

	function getNome() {
		return $this->nome;
	}

	function getIdade() {
		return $this->idade;
	}
}

$pessoa = new Pessoa(21);

$pessoa->setNome('Guilherme');

echo $pessoa->getNome() . ' tem ' . $pessoa->getIdade() . ' anos.';

?>
<?php

	class Pessoa {
		private $nome;

		function __construct($nome) {
			echo 'Construtor iniciado';
			$this->nome = $nome;
			echo $this->nome;
		}

		public function correr() {
			echo $this->nome . 'correndo. <br>';
		}

		function __destruct() {
			echo 'Objeto removido!';
		}
	}
	
	$pessoa = new Pessoa('Guilherme');
	$pessoa->correr();
	
?>

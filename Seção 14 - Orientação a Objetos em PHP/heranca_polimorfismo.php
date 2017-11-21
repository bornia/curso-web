<?php

/**
* 
*/
class Felino {
	
	var $mamifero = 'Sim';

	function correr() {
		echo 'Correr como felino.';
	}
}

class Chita extends Felino { // Herança

	// Polimorfismo
	function correr() {
		echo 'Correr como Chita a 100 km/h.';
	}
}

$chita = new Chita();

echo $chita->mamifero . '<br>';
$chita->correr();

?>
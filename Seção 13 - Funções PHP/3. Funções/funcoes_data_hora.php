<?php

echo '<p>' . date("d/m/Y H:i:s") . '</p>';

/* Diferença entre datas */

// Pelo jeito só funciona com datas nesse formato
$data_inicial = '2017/11/20';
$data_final = '2017/11/24';

// Transforma a data em segundos
$tempoInicial = strtotime($data_inicial);
$tempoFinal = strtotime($data_final);

$diferenca_de_tempo = $tempoFinal - $tempoInicial;

// Quantos segundos um dia possui
$diaSegundos = 24 * 60 * 60;

// Diferença entre as duas datas em DIAS
echo ($diferenca_de_tempo / $diaSegundos);

?>
<?php

require_once("funcoes_desconto.php");

$valor_produto = 800.00;
$desconto = 0.1;
?>

Valor do Produto: R$ <?= $valor_produto ?> <br />
Desconto: <?= $desconto ?>% <br />
Valor com Desconto: R$ <?= calcular_desconto($valor_produto, $desconto) ?>
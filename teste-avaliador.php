<?php

use Alura\Leilao\Model\Lance;
use Alura\Leilao\Model\Leilao;
use Alura\Leilao\Service\Avaliador;
use Alura\Leilao\Model\Usuario;

require 'vendor/autoload.php';

// Arrange - Given 
$leilao = new Leilao('Fiat 147 0km');

$maria = new Usuario('Maria');
$joao = new Usuario('Joao');

$leilao->recebeLance(new Lance($joao, 2000));
$leilao->recebeLance(new Lance($maria, 2500));

// Act - When
$leiloeiro = new Avaliador();
$leiloeiro->avalia($leilao);

$maiorValor = $leiloeiro->getMaiorValor();

// Assert - Then
$valorEsperado = 2500;

if ($valorEsperado == $maiorValor) {
    echo "TESTE OK";
} else {
    echo "TESTE FALHOU";
}
<?php

$date = new DateTime($_SESSION['registration_date']);

// cria um objeto IntlDateFormatter com o locale e o formato desejado
$formatter = new IntlDateFormatter('pt_BR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);

// define o pattern para formatar a data
$formatter->setPattern("MMMM 'de' y");

// exibe o resultado
echo 'Aluno desde ' . $formatter->format($date);
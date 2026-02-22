<?php

use app\CsvDto;

require __DIR__ .'/CsvDto.php';


$comercios = [];
$rows = [];
$fileContent = [];

$fileContent = file('comercio.csv');

if (count($fileContent) == 0) {
    exit('Arquivo vazio!');
}

if (empty(trim($fileContent[0]))) {
    exit('Primeira linha vazia! A primeira linha deve possuir o cabeçalho.');
}

//----------------------------------------------------
//----------------------------------------------------
foreach(array_slice($fileContent, 1) as $content) { // novo array sem a primeira linha(cabeçalho do csv)
    $rows[] = trim($content);
}

// converte os dados para classe(DTO)
foreach($rows as $row) {
    if(empty($row)) { // verifica se no meio do arquivo existe linhas vazias
        exit('Existe outra linha vazia pelo meio do arquivo.');
    } else {
        $col = explode(';', $row);

        $nome       = $col[0];
        $categoria  = $col[4];
        $telefone   = $col[1];
        $endereco   = $col[2];
        $link       = $col[3];
        $horario    = $col[5];

        $comercios[] = new CsvDto(
            nome:       $nome,
            categoria:  $categoria,
            telefone:   $telefone,
            endereco:   $endereco,
            link:       $link,
            horario:    $horario
        )

    }
}

//----------------------------------------------------
//----------------------------------------------------

// exibe em tela
foreach ($comercios as $data) {
    echo "<span>{$data->nome} </span>";
    echo "<span>{$data->telefone} </span>";
    echo "<span>{$data->categoria} </span>";
    echo "<span>{$data->endereco} </span>";
    echo "<span>{$data->horario} </span>";
    echo "<span>link: {$data->link} </span>";
    echo "<hr>";
}

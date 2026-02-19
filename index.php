<?php

use app\CsvDto;

require __DIR__ .'/CsvDto.php';

$comercios = [];

$fileContent = file('comercio.csv');

if (count($fileContent) == 0) {
    exit('Arquivo vazio');
}

if (empty(trim($fileContent[0]))) {
    exit('Primeira linha vazia!');
}

//----------------------------------------------------
//----------------------------------------------------
$rows = [];
$fileContent = array_slice($fileContent, 1); // novo array sem a primeira linha(cabeçalho do csv)
foreach($fileContent as $content) {
    $rows[] = trim($content);
}

// converte os dados para classe
foreach($rows as $row) {
    if(!empty($row)) { // verifica se no meio do arquivo existe linhas vazias
        $l = explode(';', $row);
        $nome = $l[0];
        $categoria = $l[4];
        $telefone = $l[1];
        $endereco = $l[2];
        $link = $l[3];
        $horario = $l[5];
    
        $comercios[] = new CsvDto(
            nome:$nome,
            categoria:$categoria, 
            telefone:$telefone, 
            endereco:$endereco, 
            link:$link, 
            horario:$horario
        );
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
<?php

namespace app;

readonly class CsvDto
{
    public function __construct(
        public string $nome,
        public string $categoria,
        public ?string $telefone = null,
        public ?string $endereco = null,
        public ?string $link = null,
        public ?string $horario = null,
    ) {}
}

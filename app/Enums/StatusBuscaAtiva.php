<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class StatusBuscaAtiva extends Enum
{
    const NaoIniciada = 0;
    const Iniciada = 1;
    const Concluida = 2;

    public static function list () {
        return [
            StatusBuscaAtiva::NaoIniciada,
            StatusBuscaAtiva::Iniciada,
            StatusBuscaAtiva::Concluida
        ];
    }
}

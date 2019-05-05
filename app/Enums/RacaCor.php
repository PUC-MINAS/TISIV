<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class RacaCor extends Enum
{
    const NaoInformado = 0;
    const Branca = 1;
    const Preta = 2;
    const Amarela = 3;
    const Parda = 4;

    public static function list () {
        return [
            RacaCor::NaoInformado,
            RacaCor::Branca,
            RacaCor::Preta,
            RacaCor::Amarela,
            RacaCor::Parda
        ];
    }
}

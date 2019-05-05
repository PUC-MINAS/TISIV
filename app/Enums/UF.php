<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UF extends Enum
{
    const NaoInformado = 0;
    const MG = 1;
    const CE = 2;

    public static function list () {
        return [
            UF::NaoInformado,
            UF::MG,
            UF::CE
        ];
    }
}

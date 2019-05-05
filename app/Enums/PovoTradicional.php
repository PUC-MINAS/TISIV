<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class PovoTradicional extends Enum
{
    const NaoPertence = 0;
    const Indigena = 1;
    const Quilombola = 2;
    const Cigano = 3;

    public static function list () {
        return [
            PovoTradicional::NaoPertence,
            PovoTradicional::Indigena,
            PovoTradicional::Quilombola,
            PovoTradicional::Cigano
        ];
    }
}

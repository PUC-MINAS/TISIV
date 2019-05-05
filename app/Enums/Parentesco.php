<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Parentesco extends Enum
{
    const NaoInformado = 0;
    const Pai = 1;
    const Mae = 2;
    const Avo = 3;
    const Irmao = 4;
    const Filho = 5;
    const PadrastoMadastra = 6;
    const Enteado = 7;
    const Conjuge = 8;
    const Neto = 9;
    const Tio = 10;
    const Sobrinho = 11;
    const Primo = 12;

    public static function list () {
        return [
            Parentesco::NaoInformado,
            Parentesco::Pai,
            Parentesco::Mae,
            Parentesco::Avo,
            Parentesco::Irmao,
            Parentesco::Filho,
            Parentesco::PadrastoMadastra,
            Parentesco::Enteado,
            Parentesco::Conjuge,
            Parentesco::Neto,
            Parentesco::Tio,
            Parentesco::Sobrinho,
            Parentesco::Primo
        ];
    }
}

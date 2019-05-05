<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Escolaridade extends Enum
{
    const NaoInformado = 0;
    const Analfabeto = 1;
    const FundamentalIncompleto = 2;
    const FundamentalCompleto = 3;
    const MedioIncompleto = 4;
    const MedioCompleto = 5;
    const TecnicoIncompleto = 6;
    const TecnicoCompleto = 7;
    const SuperiorIncompleto = 8;
    const SuperiorCompleto = 9;
    const PosIncompleta = 10;
    const PosCompleta = 11;

    public static function list () {
        return [
            Escolaridade::NaoInformado,
            Escolaridade::Analfabeto,
            Escolaridade::FundamentalIncompleto,
            Escolaridade::FundamentalCompleto,
            Escolaridade::MedioIncompleto,
            Escolaridade::MedioCompleto,
            Escolaridade::TecnicoIncompleto,
            Escolaridade::TecnicoCompleto,
            Escolaridade::SuperiorIncompleto,
            Escolaridade::SuperiorCompleto,
            Escolaridade::PosIncompleta,
            Escolaridade::PosCompleta
        ];
    }
}

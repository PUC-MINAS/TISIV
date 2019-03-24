<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class FormaDivulgacao extends Enum
{
    const NaoInformado = 0;
    const CRAS = 1;
    const InstituicaoPublica = 2;
    const Panfleto = 3;
    const Cartaz = 4;
    const MidiaSocial = 5;
    const Indicacao = 6;
}

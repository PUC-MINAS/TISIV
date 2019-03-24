<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class EstadoCivil extends Enum
{
    const NaoInformado = 0;
    const Solteiro = 1;
    const Casado = 2;
    const Divorciado = 3;
    const Viuvo = 4;
}

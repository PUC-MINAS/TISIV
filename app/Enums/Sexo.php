<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class Sexo extends Enum
{
    const NaoInformado = 0;
    const Masculino = 1;
    const Feminino = 2;    

    public static function getDescription($value): string
    {
        switch ($value) {
            case self::NaoInformado:
                return 'Não Informado';
            break;
            default:
                return self::getKey($value);
        }
    }
}

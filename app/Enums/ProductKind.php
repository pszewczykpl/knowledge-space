<?php

namespace App\Enums;

use App\Traits\DatabaseField;

enum ProductKind: string
{
    use DatabaseField;
    case Investment = 'I';
    case Protective = 'P';
    case Employee = 'E';
    case Bancassurance = 'B';
    public function label(): string
    {
        return match($this) {
            static::Investment => 'Inwestycyjny',
            static::Protective => 'Ochronny',
            static::Employee => 'Pracowniczy',
            static::Bancassurance => 'Bancassurance',
        };
    }
}

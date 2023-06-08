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
            ProductKind::Investment => 'Inwestycyjny',
            ProductKind::Protective => 'Ochronny',
            ProductKind::Employee => 'Pracowniczy',
            ProductKind::Bancassurance => 'Bancassurance',
        };
    }
}

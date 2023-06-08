<?php

namespace App\Enums;

use App\Traits\DatabaseField;

enum ProductType: string
{
    use DatabaseField;

    case Group = 'G';
    case Individual = 'I';

    public function label(): string
    {
        return match($this) {
            ProductType::Group => 'Grupowy',
            ProductType::Individual => 'Indywidualny',
        };
    }
}

<?php

namespace App\Enums;

use App\Traits\DatabaseField;

enum ProductPremiumType: string
{
    use DatabaseField;

    case Single = 'S';
    case Regular = 'R';

    public function label(): string
    {
        return match($this) {
            ProductPremiumType::Single => 'Jednorazowa',
            ProductPremiumType::Regular => 'Regularna',
        };
    }
}

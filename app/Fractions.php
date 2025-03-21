<?php

namespace App;

enum Fractions: string
{
    case PURGATORY = 'purgatory';


    public function label(): string
    {
        return match($this) {
            self::PURGATORY => 'Purgatory',
        };
    }
}

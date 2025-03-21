<?php

namespace App;


enum Locations: string
{
    case TUNGUSKA = 'tunguska';
    public function label(): string
    {
        return match($this) {
            self::TUNGUSKA => 'Tunguska',
        };
    }
}

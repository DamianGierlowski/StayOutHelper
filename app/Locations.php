<?php

namespace App;


enum Locations: string
{

    case LESNAYA = '0';
    case LIUBECH = '1';
    case LIUBECH_OUTLANDS = '2';
    case VESUVIUS = '3';
    case AIRPORT = '4';
    case TUNGUSKA = '5';
    case NEW_EARTH_NORTH = '6';
    case NEW_EARTH_SOUTH = '7';
    case CARAVAN = '8';
    case BLACK_FOREST = '9';

    case PRISON = '10';
    case TOTEMS = '11';

    case DUNGEON = '12';
    case DUNGEON_N = '13';
    case CITY_N = '14';
    case CAVE = '15';

    public function label(): string
    {
        return match($this) {
            self::AIRPORT => 'Airport',
            self::BLACK_FOREST => 'Black Forest',
            self::CARAVAN => 'Caravan',
            self::CAVE => 'Cave',
            self::CITY_N => 'City N',
            self::DUNGEON => 'Dungeon',
            self::DUNGEON_N => 'Dungeon N',
            self::LESNAYA => 'Lesnaya',
            self::LIUBECH => 'Liubech',
            self::LIUBECH_OUTLANDS => 'Liubech Outlands',
            self::NEW_EARTH_NORTH => 'New Earth North',
            self::NEW_EARTH_SOUTH => 'New Earth South',
            self::PRISON => 'Prison',
            self::TOTEMS => 'Totems',
            self::TUNGUSKA => 'Tunguska',
            self::VESUVIUS => 'Vesuvius',
            default => '',
        };
    }
}

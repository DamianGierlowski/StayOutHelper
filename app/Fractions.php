<?php

namespace App;

use function Laravel\Prompts\search;

enum Fractions: string
{

    // Main Fractions
    case FORMER_ADMINISTRATION = '0';
    case AESS_CISS = '1';
    case FUTURE_SCIENCE = '2';
    case OMEGA = '3';
    case PMC = '4';
    case BLACK_MARKET ='5';

    // Other
    case MOKRUHA_GANG = '6';
    case LIGHT_PATH = '7';
    case KONUKOVO_AIRPORT = '8';
    CASE DISTILLERY_BAR = '9';
    case HOC_HUCKSTERS = '10';
    case MILITARY_CITY = '11';
    case STATION_PEOPLE = '12';
    case USOV_VILLAGE = '13';
    case WINTER_HUT = '14';
    case NOAH = '15';
    case COMMANDANTS_OFFICE = '16';
    case SPIT_OFFICE = '17';
    case GOURMET_KITCHEN = '18';
    case AEGIS_CAMP = '19';
    case SELEKTEVICH_CAMP = '20';
    case PEOPLE_OF_THE_SWAMP = '21';
    case SUNSET_RS = '22';
    case NORTHERN_PORT = '23';
    case RADIUS_VILLAGE = '24';
    case IMAREK_POST ='25';
    case RADIO_TOWER = '26';
    case RYABINUSHKA_GARDEN = '27';
    case KRASNO_VILLAGE = '28';
    case SIBERIAN_FARM = '29';
    case UTES_PSC = '30';
    case PURGATORY = '31';
    case SCHLEIMOVICH_CAMP = '32';

    public function label(): string
    {
        return match($this) {
            self::AEGIS_CAMP => 'Aegis Camp',
            self::AESS_CISS => 'AESS CIS',
            self::BLACK_MARKET => 'Black market',
            self::COMMANDANTS_OFFICE => 'Commandants office',
            self::DISTILLERY_BAR => 'Distilly Bar',
            self::FORMER_ADMINISTRATION => 'Former administration',
            self::FUTURE_SCIENCE => 'Future science',
            self::GOURMET_KITCHEN => 'Gourmet Kitchen',
            self::HOC_HUCKSTERS => 'HoC Hucksters',
            self::IMAREK_POST => 'Imarek Post',
            self::KONUKOVO_AIRPORT => 'Konkovovo airport',
            self::KRASNO_VILLAGE => 'Krasnov village',
            self::LIGHT_PATH => 'Light path',
            self::MILITARY_CITY => 'Military city',
            self::MOKRUHA_GANG => 'Mokruha Gang',
            self::NOAH => 'Noah Ark',
            self::NORTHERN_PORT => 'Northern is. Port',
            self::OMEGA => '"Omega" special unit',
            self::PEOPLE_OF_THE_SWAMP => 'People of The Swamp',
            self::PMC => 'Ravenhood PMC',
            self::PURGATORY => 'Purgatory',
            self::RADIO_TOWER => 'Radio tower',
            self::RADIUS_VILLAGE => 'Radius Village',
            self::RYABINUSHKA_GARDEN => 'Ryabinushka Garden',
            self::SCHLEIMOVICH_CAMP => 'Schleimovich Camp',
            self::SELEKTEVICH_CAMP => 'Selectevich Camp',
            self::SIBERIAN_FARM => 'Siberian farm',
            self::SPIT_OFFICE => 'Spit Office',
            self::STATION_PEOPLE => 'Station People',
            self::SUNSET_RS => 'Sunset RS',
            self::USOV_VILLAGE => 'Usov village',
            self::UTES_PSC => 'UTES PSC',
            self::WINTER_HUT => 'Winter hut',
            default => '',
        };
    }

}

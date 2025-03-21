<?php

namespace App\Models;

use App\Fractions;
use App\Locations;
use Illuminate\Database\Eloquent\Model;

class QuestTaken extends Model
{
    protected $fillable = [
        'name',
        'location',
        'fraction',
        'position',
        'cooldown',
        'taken_date',
        'npc'
    ];

    protected $casts = [
        'location' => Locations::class,
        'fraction' => Fractions::class,
        'taken_date' => 'datetime:Y-m-d H:i:s'
    ];
}

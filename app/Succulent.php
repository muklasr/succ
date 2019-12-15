<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Succulent extends Model
{
    protected $fillable = [
        'name',
        'origin',
        'description',
        'id_family',
        'id_type',
        'mature_size',
        'hardiness_zone',
        'light',
        'water',
        'temperature',
        'soil',
        'soil_ph',
        'flower_color',
        'special_features',
        'image'
    ];
}

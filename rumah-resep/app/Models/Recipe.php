<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model;

class Recipe extends Model
{
    protected $connection = 'mongodb';

    protected $fillable = [
        'title',
        'categories',
        'rating',
        'calories',
        'protein',
        'fat',
        'sodium',
        'desc',
        'ingredients',
        'directions',
    ];
}

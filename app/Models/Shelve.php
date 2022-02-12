<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelve extends Model
{
    use HasFactory;
    public $fillable = [
        'city_id',
        'country_id',
        'shelvelocation_id',
        'shelveno',


    ];
}

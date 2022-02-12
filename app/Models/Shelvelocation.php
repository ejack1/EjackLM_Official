<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelvelocation extends Model
{
    use HasFactory;
    public $fillable = [
        'city_id',
        'country_id',
        'warehouse',


    ];
}

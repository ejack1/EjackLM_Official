<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    public $fillable = [
        'type',
        'startrange',
        'endrange',
        'maximumweight',
        'dsetup',
        'maximumheight',
        'maximumwidth',
        'maximumlength',
        'servicetype',
        'pickupcharge',
        'timefrom',
        'timeto',
        'printer',
        'compensation',
        'desc'


    ];
}

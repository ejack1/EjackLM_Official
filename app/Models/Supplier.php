<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'rate',
        'phone',
        'contactdate',
        'country_id',
        'state_id',
        'city_id',
        'vatno',
        'crfile',
        'Idfile',
        'contractfile'

    ];

}
 
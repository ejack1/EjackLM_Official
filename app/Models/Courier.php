<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Courier extends Model
{
    use HasFactory;
    protected $table="couriers";

    public $fillable = [
        'name',
        'country_id',
        'code',
        'mobile',
        'email',
        'iqamanumber',
        'iqamafile',
        'license',
        'vehicle',
        'color',
        'supplier',
        'password',
        'vehiclenumber',
        'image',
        'joindate',

    ];
}

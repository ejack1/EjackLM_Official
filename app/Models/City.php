<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;
    public $fillable = [
        'name',
        'smsacity',
        'city_code',
        'title',
        'desc',
        'keywords',
        'state_id',
        'country_id'

    ];
    public function state()
    {
        return $this->belongsTo(State::class);
    }


}

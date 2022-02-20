<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class general_setting extends Model
{
    use HasFactory;
    protected $table = "general_settings";

    public function currency()
    {
        return $this->hasOne(currency::class);
    }
}

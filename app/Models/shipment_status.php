<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class shipment_status extends Model
{
    use HasFactory;
    protected $table = "shipment_statuses";

    public function shipment()
    {
        return $this->belongsTo(shipment::class);
    }
}

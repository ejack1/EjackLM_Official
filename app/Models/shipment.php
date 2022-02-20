<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Node\Expr\FuncCall;

class shipment extends Model
{
    use HasFactory;
    protected $table = "shipments";

    // protected $fillable = ['reference'];
    protected $guarded = [];  


    //R
    public function city()
    {
        return $this->hasMany(city::class,'id','sender_shipment_city');
        // return $this->hasMany(city::class);
    }

    public function r_city()
    {
        return $this->hasMany(city::class,'id','receiver_shipment_city');
        // return $this->hasMany(city::class);
    }

    public function country()
    {
        return $this->hasMany(country::class,'id','sender_shipment_country');
        // return $this->hasMany(city::class);
    }

    public function r_country()
    {
        return $this->hasMany(country::class,'id','receiver_shipment_country');
        // return $this->hasMany(city::class);
    }

    // public function shipment_status()
    // {
    //     return $this->hasOne(shipment_status::class,'id','status');
    // }

    public function shipment_status()
    {
        return $this->hasOne(shipment_status::class,'id','status');
    }

    public function ship_zone()
    {
        return $this->hasOne(zone::class,'id','zone');
    }


    public function paymentMode()
    {
        return $this->hasOne(payment_mode::class,'id','payment_mode');
    }

    public function serviceMode()
    {
        return $this->hasOne(service_mode::class,'id','service_mode');
    }

    
    // public function name()
    // {
    //     return $this->name;
    // }
}

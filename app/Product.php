<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';

    public function consumptions(){
        return $this->hasMany(Consumption::class);
    }

    public function arrivals(){
        return $this->hasMany(Arrival::class);
    }

    public function storages(){
        return $this->hasMany(Storage::class);
    }
}

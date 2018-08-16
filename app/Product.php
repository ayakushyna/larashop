<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function arrivals()
    {
        return $this->hasMany(Arrival::class);
    }

    public function departures()
    {
        return $this->hasMany(Departure::class);
    }
}

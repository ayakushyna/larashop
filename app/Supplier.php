<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function departures()
    {
        return $this->hasMany(Departure::class);
    }
}

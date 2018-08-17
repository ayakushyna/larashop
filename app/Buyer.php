<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    public function departures()
    {
        return $this->hasMany(Departure::class);
    }
}

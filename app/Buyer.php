<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Buyer extends Model
{
    public function arrivals()
    {
        return $this->hasMany(Arrival::class);
    }
}

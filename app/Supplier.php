<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    public function arrivals()
    {
        return $this->hasMany(Arrival::class);
    }
}

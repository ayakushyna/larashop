<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $table = 'suppliers';

    public function arrivals(){
        return $this->hasMany(Arrival::class);
    }

}

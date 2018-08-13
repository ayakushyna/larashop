<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrival extends Model
{
    protected $table = 'arrival_of_goods';

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}

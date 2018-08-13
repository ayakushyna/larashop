<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    protected $table = 'consumption_of_goods';

    public function buyer(){
        return $this->belongsTo(Buyer::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departure extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function buyer()
    {
        return $this->belongsTo(Buyer::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrival extends Model
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function storage()
    {
        return $this->belongsTo(Storage::class);
    }
}

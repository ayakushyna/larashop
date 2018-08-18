<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function losses()
    {
        return static::sum(DB::raw('price_per_tonne * tonnes + shipping_cost'));
    }
}

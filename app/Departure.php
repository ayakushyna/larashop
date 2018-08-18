<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public static function income()
    {
        return static::sum(DB::raw('price_per_tonne * tonnes + shipping_cost'));
    }
}

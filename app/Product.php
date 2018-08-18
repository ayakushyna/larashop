<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function arrivals()
    {
        return $this->hasMany(Arrival::class);
    }

    public function departures()
    {
        return $this->hasMany(Departure::class);
    }

    public function soldTonnes()
    {
        return $this->departures()->sum('tonnes');
    }

    public static function percents()
    {
        return static::leftJoin('departures', 'products.id','=','departures.product_id')
            ->selectRaw('products.name,
            sum(departures.tonnes) as tonnes, 
            round(sum(departures.tonnes)*100/(select sum(tonnes) from departures)) as percent')
            ->groupBy('products.id')
            ->orderBy('tonnes', 'desc')
            ->get();
    }
}

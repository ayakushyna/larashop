<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Product;
use App\Storage;
use App\Supplier;
use Illuminate\Http\Request;

class StorageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Storage $storage){
        $arrivals = $storage->arrivals()->orderBy('id')->get();
        $departures = $storage->departures()->orderBy('id')->get();
        $products = Product::all();
        $suppliers = Supplier::all();
        $buyers = Buyer::all();
        $storages = Storage::all();
        return view('storages.show', compact(['storage','arrivals','departures','products','suppliers','buyers','storages']));
    }
}

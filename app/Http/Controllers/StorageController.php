<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\Product;
use App\Storage;
use App\Supplier;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


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
        return view('storages.show',
            compact(['storage','arrivals','departures','products','suppliers','buyers','storages']
            ));
    }

    public function store()
    {
        $validator = Validator::make( request()->all(),[
            'name' => 'required|regex:/([A-Z][a-z]{2,} )([A-Z][a-z]{2,} )?([A-Z][a-z]{2,})/',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        Arrival::insert([
            'name' => request('name'),
            'created_at' => request('created_at'),
        ]);

        return response()->json(['success' => 'Successfully created!']);
    }
    public function update(Arrival $arrival)
    {
        $validator = Validator::make( request()->all(),[
            'name' => 'required|regex:/([A-Z][a-z]{2,} )([A-Z][a-z]{2,} )?([A-Z][a-z]{2,})/',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        Arrival::where('id', $arrival->id)->update([
            'name' => request('name'),
            'created_at' =>request('created_at'),
        ]);

        return response()->json(['success' => 'Successfully edited!']);
    }

    public function delete(Arrival $arrival){
        if($arrival)
        {
            $arrival->delete();
        }
        return response()->json(['success' => "Successfully deleted!"]);
    }
}

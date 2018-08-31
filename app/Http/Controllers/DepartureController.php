<?php

namespace App\Http\Controllers;

use App\Departure;
use App\Product;
use App\Storage;
use App\Buyer;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class DepartureController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $departures = Departure::orderBy('id')->get();
        $products = Product::all();
        $buyers = Buyer::all();
        $storages = Storage::all();
        return view('departures.index', compact(['departures','products','buyers','storages']));
    }

    public function store()
    {
        $validator = Validator::make( request()->all(),[
            'price_per_tonne' => 'required|numeric|min:0|max:1000000',
            'tonnes' => 'required|numeric|min:0|max:1000000',
            'shipping_cost' => 'required|numeric|min:0|max:1000000'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        Departure::insert([
            'product_id' => request('product'),
            'buyer_id' => request('buyer'),
            'storage_id' => request('storage'),
            'price_per_tonne' => request('price_per_tonne'),
            'tonnes' => request('tonnes'),
            'shipping_cost' => request('shipping_cost'),
            'created_at' => request('created_at'),
        ]);

        return response()->json(['success' => 'Successfully created!']);
    }

    public function update(Departure $departure)
    {
        $validator = Validator::make( request()->all(),[
            'price_per_tonne' => 'required|numeric|min:0|max:1000000',
            'tonnes' => 'required|numeric|min:0|max:1000000',
            'shipping_cost' => 'required|numeric|min:0|max:1000000'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        Departure::where('id', $departure->id)->update([
            'product_id' => request('product'),
            'buyer_id' => request('buyer'),
            'storage_id' => request('storage'),
            'price_per_tonne' => request('price_per_tonne'),
            'tonnes' => request('tonnes'),
            'shipping_cost' => request('shipping_cost'),
            'created_at' =>request('created_at'),
        ]);

        return response()->json(['success' => 'Successfully edited!']);
    }

    public function delete(Departure $departure){
        if($departure)
        {
            $departure->delete();
        }
        return response()->json(['success' => "Successfully deleted!"]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Arrival;
use App\Product;
use App\Storage;
use App\Supplier;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ArrivalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $arrivals = Arrival::orderBy('id')->get();
        $products = Product::all();
        $suppliers = Supplier::all();
        $storages = Storage::all();

        return view('arrivals.index', compact(['arrivals','products','suppliers','storages']));
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

        Arrival::insert([
            'product_id' => request('product'),
            'supplier_id' => request('supplier'),
            'storage_id' => request('storage'),
            'price_per_tonne' => request('price_per_tonne'),
            'tonnes' => request('tonnes'),
            'shipping_cost' => request('shipping_cost'),
            'created_at' => request('created_at'),
        ]);

        return response()->json(['success' => 'Successfully created!']);
    }

    public function update(Arrival $arrival)
    {
        $validator = Validator::make( request()->all(),[
            'price_per_tonne' => 'required|numeric|min:0|max:1000000',
            'tonnes' => 'required|numeric|min:0|max:1000000',
            'shipping_cost' => 'required|numeric|min:0|max:1000000'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        Arrival::where('id', $arrival->id)->update([
            'product_id' => request('product'),
            'supplier_id' => request('supplier'),
            'storage_id' => request('storage'),
            'price_per_tonne' => request('price_per_tonne'),
            'tonnes' => request('tonnes'),
            'shipping_cost' => request('shipping_cost'),
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

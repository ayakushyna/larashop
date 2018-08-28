<?php

namespace App\Http\Controllers;

use App\Arrival;
use App\Product;
use App\Storage;
use App\Supplier;
use Illuminate\Http\Request;

class ArrivalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $arrivals = Arrival::all();
        $products = Product::all();
        $suppliers = Supplier::all();
        $storages = Storage::all();
        return view('arrivals.index', compact(['arrivals','products','suppliers','storages']));
    }

    public function update($arrival_id)
    {
        $this->validate( request(),[
            'price_per_tonne' => 'required',
            'tonnes' => 'required',
            'shipping_cost' => 'required'
        ]);

        Arrival::where('id',$arrival_id)->update([
            'product_id' => request('product')->id,
            'supplier_id' => request('supplier')->id,
            'storage_id' => request('storage')->id,
            'price_per_tonne' => request('price_per_tonne'),
            'tonnes' => request('tonnes'),
            'shipping_cost' => request('shipping_cost'),
            'created_at' =>request('created_at'),
        ]);

        return back();
    }

    public function delete($arrival_id){
        $arrival = Arrival::find($arrival_id);
        if($arrival)
        {
            $arrival->delete();
        }
        return "SUCCESS!!!";
    }
}

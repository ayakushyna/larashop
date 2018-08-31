<?php

namespace App\Http\Controllers;

use App\Product;
use \Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Product $product){
        return view('products.show', compact('product'));
    }

    public function update(Product $product)
    {
        $validator = Validator::make( request()->all(),[
            'name' => 'required|regex:/([A-Z][a-z]{2,} )?([A-Z][a-z]{2,} )?([A-Z][a-z]{2,})/',
            'material'=>'required',
            'description' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        Product::where('id',$product->id)->update([
            'name' => request('name'),
            'material' => request('material'),
            'description' => request('description'),
        ]);

        return response()->json(['success' => 'Successfully edited!']);
    }
}

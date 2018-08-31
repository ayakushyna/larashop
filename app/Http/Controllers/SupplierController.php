<?php

namespace App\Http\Controllers;

use App\Rules\Phone;
use Illuminate\Http\Response;
use \Illuminate\Support\Facades\Validator;
use App\Supplier;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $suppliers = Supplier::orderBy('id')->get();
        $countries = Country::$countries;
        return view('suppliers.index', compact(['suppliers','countries']));
    }

    public function show(Supplier $supplier){
        $countries = Country::$countries;
        return view('suppliers.show', compact(['supplier','countries']));
    }

    public function store()
    {
        $validator = Validator::make(request()->all(), [
            'name' => 'required|regex:/([A-Z][a-z]{2,} )([A-Z][a-z]{2,} )?([A-Z][a-z]{2,})/',
            'credit' => 'required|numeric|min:0|max:1000000',
            'prepayment' => 'required|numeric|min:0|max:1000000',
            'email' => [
                'required',
                'email'
            ],
            'phone' => [
                'required',
                new Phone()
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=> $validator->errors()]);
        }

        Supplier::insert([
            'name' => request('name'),
            'credit' => request('credit'),
            'prepayment' => request('prepayment'),
            'country' => request('country'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);

        return response()->json(['success' => 'Successfully created!']);
    }

    public function update(Supplier $supplier)
    {
        $validator = Validator::make( request()->all(),[
            'name' => 'required|regex:/([A-Z][a-z]{2,} )([A-Z][a-z]{2,} )?([A-Z][a-z]{2,})/',
            'credit' => 'required|numeric|min:0|max:1000000',
            'prepayment' => 'required|numeric|min:0|max:1000000',
            'email' => [
                'required',
                'email',
                Rule::unique('suppliers')->ignore($supplier->id),
                ],
            'phone' => [
                'required',
                new Phone(),
                Rule::unique('suppliers')->ignore($supplier->id),
                ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        Supplier::where('id',$supplier->id)->update([
            'name' => request('name'),
            'credit' => request('credit'),
            'prepayment' => request('prepayment'),
            'country' => request('country'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);

        return response()->json(['success' => 'Successfully edited!']);
    }

    public function delete(Supplier $supplier){
        if($supplier) {
            $supplier->arrivals()->delete();
            $supplier->delete();
        }
        return response()->json(['success' => "Successfully deleted!"]);
    }
}

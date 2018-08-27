<?php

namespace App\Http\Controllers;

use App\Rules\Phone;
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
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function show(Supplier $supplier){
        $countries = Country::$countries;
        return view('suppliers.show', compact(['supplier','countries']));
    }

    public function update(Supplier $supplier)
    {
        $validator = Validator::make( request()->all(),[
            'name' => 'required|regex:/([A-Z][a-z]{2,} )([A-Z][a-z]{2,} )?([A-Z][a-z]{2,})/',
            'credit' => 'required',
            'prepayment' => 'required',
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
            return back()
                ->withErrors($validator);
        }

        Supplier::where('id',$supplier->id)->update([
            'name' => request('name'),
            'credit' => request('credit'),
            'prepayment' => request('prepayment'),
            'country' => request('country'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);

        return back();
    }
}

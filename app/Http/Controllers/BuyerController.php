<?php

namespace App\Http\Controllers;

use App\Rules\Phone;
use Illuminate\Http\Response;
use \Illuminate\Support\Facades\Validator;
use App\Buyer;
use App\Country;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class BuyerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $buyers = Buyer::orderBy('id')->get();
        $countries = Country::$countries;
        return view('buyers.index', compact(['buyers','countries']));
    }

    public function show(Buyer $buyer){
        $countries = Country::$countries;
        return view('buyers.show', compact(['buyer','countries']));
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

        Buyer::insert([
            'name' => request('name'),
            'credit' => request('credit'),
            'prepayment' => request('prepayment'),
            'country' => request('country'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);

        return response()->json(['success' => 'Successfully created!']);
    }

    public function update(Buyer $buyer)
    {
        $validator = Validator::make( request()->all(),[
            'name' => 'required|regex:/([A-Z][a-z]{2,} )([A-Z][a-z]{2,} )?([A-Z][a-z]{2,})/',
            'credit' => 'required|numeric|min:0|max:1000000',
            'prepayment' => 'required|numeric|min:0|max:1000000',
            'email' => [
                'required',
                'email',
                Rule::unique('suppliers')->ignore($buyer->id),
            ],
            'phone' => [
                'required',
                new Phone(),
                Rule::unique('suppliers')->ignore($buyer->id),
            ],
        ]);

        if ($validator->fails()) {
            return response()->json(['errors'=>$validator->errors()]);
        }

        Buyer::where('id',$buyer->id)->update([
            'name' => request('name'),
            'credit' => request('credit'),
            'prepayment' => request('prepayment'),
            'country' => request('country'),
            'email' => request('email'),
            'phone' => request('phone'),
        ]);

        return response()->json(['success' => 'Successfully edited!']);
    }

    public function delete(Buyer $buyer){
        if($buyer) {
            $buyer->departures()->delete();
            $buyer->delete();
        }
        return response()->json(['success' => "Successfully deleted!"]);
    }
}

<?php

namespace App\Http\Controllers;

use App\Arrival;
use Illuminate\Http\Request;

class ArrivalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $arrivals = Arrival::all();
        return view('arrivals.index', compact('arrivals'));
    }

    public function delete(Request $request){
        return Arrival::where('id',$request->id)->get()->first()->delete();
    }
}

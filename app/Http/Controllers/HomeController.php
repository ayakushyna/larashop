<?php

namespace App\Http\Controllers;

use App\Arrival;
use App\Buyer;
use App\Departure;
use App\Product;
use App\Storage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $request->user()->authorizeRoles(['admin','employee', 'manager']);

        $revenue = Departure::income() - Arrival::losses();

        $sales = Departure::count();
        $storages = Storage::count();
        $customers = Buyer::count();

        $products = Product::percents();

        return view('homepage.index', compact(['revenue','sales','storages', 'customers','products']));
    }

    /*
  public function someAdminStuff(Request $request)
  {
    $request->user()->authorizeRoles('manager');
    return view(‘some.view’);
  }
  */
}

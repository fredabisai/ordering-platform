<?php

namespace App\Http\Controllers;

use App\Location;
use App\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function login()
    {
        return view('pages.login');
    }
    public function dashboard()
    {
        $locations = Location::all();
        $products = Product::all();
        return view('pages.dashboard', ['products' => $products, 'locations' => $locations]);
    }
}

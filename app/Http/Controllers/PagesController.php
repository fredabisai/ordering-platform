<?php

namespace App\Http\Controllers;

use App\Location;
use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class PagesController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return Redirect::to('dashboard');
        }

        return view('pages.login');
    }
    public function dashboard()
    {
        if (!Auth::check()) {
            return Redirect::to('/');
        }
        $locations = Location::all();
        $products = Product::all();
        $orders = Order::with('user', 'product', 'location')->where('user_id', '=', Auth::user()->id)->get();
        return view('pages.dashboard', ['products' => $products, 'locations' => $locations, 'orders' => $orders]);
    }
    public function logout()
    {
        Auth::logout();
        return Redirect::to('/');
    }
}

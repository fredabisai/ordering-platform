<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;


class OrderController extends Controller
{
    public function create(Request $request)
    {
        $rules = array(
            'product_id' => 'required|numeric',
            'location_id' => 'required|numeric',
            'total_price' => 'required'
        );

        $validator = validator($request->all(), $rules);
        if ($validator->fails()) {
            return Redirect::to('dashboard');
        }
        $order = new Order();
        $user = Auth::user();
        $order->product_id = $request->get('product_id');
        $order->user_id = $user->id;
        $order->location_id = $request->get('location_id');
        $order->total_price = $request->get('total_price');
        $order->save();
        return Redirect::to('/dashboard');
        // $data = Order::findOrFail($order->product_id)->with('user', 'location', 'product');
    }
}

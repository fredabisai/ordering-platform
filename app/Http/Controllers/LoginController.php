<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class LoginController extends Controller
{
    public function authenticate(Request $request)
    {

        $rules = array(
            'email'    => 'required|email',
            'password' => 'required|string|min:5'
        );

        $validator = $request->validate($rules);


        // if ($validator->fails()) {
        //     return Redirect::to('login')
        //         ->withErrors($validator)
        //         ->withInput(Input::except('password'));
        // } else {

        $user_data = array(
            'email'     => $request->get('email'),
            'password'  => $request->get('password')
        );

        if (Auth::attempt($user_data)) {

            echo 'SUCCESS!';
        } else {

            return Redirect::to('login');
        }
        // }
    }
}

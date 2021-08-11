<?php

namespace App\Http\Controllers;

use App\Order;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Session;

class UserController extends Controller
{
    public function getSignup()
    {
        return view('signup');
    }

    public function postSignup(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required|unique:users',
            'password' => 'required|min:4'
        ]);
        $user = new User([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ]);
        $user->save();
        Auth::login($user);
        return redirect('/')->with('success', 'Inregistrare efectuata cu succes!');
    }

    public function getSignin()
    {
        return view('signin');
    }

    public function postSignin(Request $request)
    {
        $this->validate($request, [
            'email' => 'email|required',
            'password' => 'required|min:4'
        ]);

        if (Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return redirect('/user/profile');
        }
        return redirect('/signup');
    }

    public function getProfile()
    {
        $orders = Auth::user()->orders;
        $orders->transform(function ($order, $key) {
            $order->cart = unserialize(base64_decode($order->cart));
            return $order;
        });
        return view('profile', ['orders' => $orders]);
    }

    public function getLogout()
    {
        Auth::logout();
        if (Session::has('cart')) {
            Session::forget('cart');
        }
        return redirect('/');
    }
}

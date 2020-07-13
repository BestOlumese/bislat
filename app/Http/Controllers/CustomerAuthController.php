<?php

namespace App\Http\Controllers;

use Auth;
use App\Customer;
use Session;
use Illuminate\Http\Request;

class CustomerAuthController extends Controller
{
    public function __construct()
    {   
        $this->middleware('guest:customer', ['except' => ['logout']]);
    }

    public function showregisterform()
    {
        return view('customer.register');
    }

    public function register(Request $request)
    {
        $this->validation($request);
        $request['password'] = bcrypt($request->password);
        $customer = Customer::create($request->all());
        Auth::guard('customer')->login($customer);

        Session::flash('success', 'You have been sucessfully registered');
        return redirect()->route('customer.dashboard');
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed'
        ]);
    }

    public function showloginform()
    {
        return view('customer.login');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('customer')->attempt(['email' => $request->email, 'password' => $request->password])) {
            Session::flash('success', 'You have been logged in successfully');
            return redirect()->route('customer.dashboard');
        }

        Session::flash('info', 'Your are not registered yet!');
        return redirect()->back()->withInput($request->only('email'));
    }

    public function logout() {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}

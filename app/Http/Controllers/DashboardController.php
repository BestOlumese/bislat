<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Customer;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }

    public function index()
    {
        return view('customer.dashboard');
    }

    public function myaccount()
    {
        $auth = Auth::guard('customer')->user()->id;

        return view('customer.myaccount')->with('customer', Customer::find($auth));
    }

    public function changepassword()
    {
        $auth = Auth::guard('customer')->user()->id;

        return view('customer.changepassword')->with('customer', Customer::find($auth));
    }

    public function myaccount_update(Request $request, $id)
    {
        $this->validation($request);
        $customer = Customer::find(Auth::guard('customer')->user()->id);
        if(empty($request->email)){
            $request->email = $customer->email;
        }else{
            $request->email = $request->email;
        }
        $customer->email = $request->email;
        if(empty($request->pnumber)){
            $request->pnumber = $customer->pnumber;
        }else{
            $request->pnumber = $request->pnumber;
        }
        $customer->pnumber = $request->pnumber;
        $customer->save();
        Auth::guard('customer')->logout();

        Session::flash('success', 'Your account has been updated please log in again');
        return redirect()->route('customer.login');
    }

    public function changepassword_update(Request $request)
    {
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed'
        ]);
        $customer = Customer::find(Auth::guard('customer')->user()->id);
        $customer->password = bcrypt($request->password);
        $customer->save();
        Auth::guard('customer')->logout();

        Session::flash('success', 'Password has been changed successfully');
        return redirect()->route('customer.login');
    }

    public function validation($request)
    {
        return $this->validate($request, [
            'email' => 'string|email|max:255|unique:customers'
        ]);
    }
}

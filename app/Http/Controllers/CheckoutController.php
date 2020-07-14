<?php

namespace App\Http\Controllers;

use App\CustomerAddresses;
use Auth;
use Session;
use Cart;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function checkout()
    {
        if(!Auth::guard('customer')->check()){
            Session::flash('info', 'Please login to checkout');
            return redirect()->route('index');
        }else if(Cart::content()->count() == 0){
            Session::flash('info', 'Tour cart is empty');
            return redirect()->route('index');
        }

        $customer = CustomerAddresses::where('customer_id', Auth::guard('customer')->user()->id)->firstOrfail();

        return view('checkout')
                ->with('customer', $customer);
    }
}

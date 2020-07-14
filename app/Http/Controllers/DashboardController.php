<?php

namespace App\Http\Controllers;

use Session;
use Auth;
use App\Customer;
use App\CustomerAddresses;
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
    public function addressbook()
    {
        $customer = CustomerAddresses::where('customer_id', Auth::guard('customer')->user()->id)->firstOrfail();

        return view('customer.addressbook')
                ->with('customer', $customer);
    }

    public function addressbook_update(Request $request)
    {
        $customer_addr = CustomerAddresses::where('customer_id', Auth::guard('customer')->user()->id)->firstOrfail();
        $customer_addr->billing_first_name = $request->billing_first_name;
        $customer_addr->billing_last_name = $request->billing_last_name;
        $customer_addr->billing_country = $request->billing_country;
        $customer_addr->billing_address_1 = $request->billing_address_1;
        $customer_addr->billing_address_2 = $request->billing_address_2;
        $customer_addr->billing_state = $request->billing_state;
        $customer_addr->billing_city = $request->billing_city;
        $customer_addr->billing_postcode = $request->billing_postcode;
        if(empty($request->shipping_first_name)) {
            $customer_addr->shipping_first_name = $request->billing_first_name;
        }else{
            $customer_addr->shipping_first_name = $request->shipping_first_name;
        }
        if(empty($request->shipping_last_name)) {
            $customer_addr->shipping_last_name = $request->billing_last_name;
        }else{
            $customer_addr->shipping_last_name = $request->shipping_first_name;
        }
        if(empty($request->shipping_country)) {
            $customer_addr->shipping_country = $request->billing_country;
        }else{
            $customer_addr->shipping_country = $request->shipping_country;
        }
        if(empty($request->shipping_address_1)) {
            $customer_addr->shipping_address_1 = $request->billing_address_1;
        }else{
            $customer_addr->shipping_address_1 = $request->shipping_address_1;
        }
        if(empty($request->shipping_address_2)) {
            $customer_addr->shipping_address_2 = $request->billing_address_2;
        }else{
            $customer_addr->shipping_address_2 = $request->shipping_address_2;
        }
        if(empty($request->shipping_state)) {
            $customer_addr->shipping_state = $request->billing_state;
        }else{
            $customer_addr->shipping_state = $request->shipping_state;
        }
        if(empty($request->shipping_city)) {
            $customer_addr->shipping_city = $request->billing_city;
        }else{
            $customer_addr->shipping_city = $request->shipping_city;
        }
        if(empty($request->shipping_postcode)) {
            $customer_addr->shipping_postcode = $request->billing_postcode;
        }else{
            $customer_addr->shipping_postcode = $request->shipping_postcode;
        }
        $customer_addr->save();

        Session::flash('success', 'Address Book Saved Successfully');
        return redirect()->back();
    }
}

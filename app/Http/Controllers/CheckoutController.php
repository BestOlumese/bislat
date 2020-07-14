<?php

namespace App\Http\Controllers;

use App\CustomerAddresses;
use App\Order;
use App\Product;
use Auth;
use Session;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function order(Request $request)
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
        $cusaddr = CustomerAddresses::where('customer_id', Auth::guard('customer')->user()->id)->firstOrfail();
        foreach (Cart::content() as $cart) {
            $cart_id = $cart->model->id;
            $get_product = DB::select("select * from products where id='$cart_id'");
            foreach ($get_product as $row_product) {
                $sub_total = $cart->total();
                Order::create([
                    'customer_id' => Auth::guard('customer')->user()->id,
                    'due_amount' => $sub_total,
                    'invoice_no' => mt_rand(),
                    'product_id' => $row_product->id,
                    'customer_address_id' => $cusaddr->id,
                    'qty' => $cart->qty,
                    'payment_method' => 'Cash on Delivery'
                ]); 
                Cart::destroy();
                Session::flash('success', 'Order created successfully');
                return redirect()->route('index');
            }
        }
    }
}

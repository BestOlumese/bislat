<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    public function orders()
    {
        $orders = Order::all();

        return view('admin.orders.order')
                ->with('orders', $orders);
    }

    public function order_view($id)
    {
        $order = Order::find($id);

        return view('admin.orders.view')
            ->with('order', $order);
    }
}

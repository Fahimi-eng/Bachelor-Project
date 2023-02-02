<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class orderController extends Controller
{
    public function index()
    {
        $orders = Order::query()->with(['tables'])->get();
        return view('Admin.dashboard',[
            'orders' => $orders
        ]);
    }

    public function show($id)
    {
        $order = Order::query()->with(['tables','foods'])->where('id' , $id)->first();
        return view('Admin.Order.show',[
            'order' => $order
        ]);
    }
}

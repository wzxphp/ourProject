<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Order;

class OrderController extends Controller
{
    //订单列表
    public function index()
    {
        $cates = Order::get();
//        dd($cates);

        return view('admin.order.list',compact('cates'));
    }

}

<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{


    public function index(){
        $orders=Order::paginate(PAGINATION_COUNT);
        return view('layouts.admin.orders.index',['orders' => $orders]);
    }


}

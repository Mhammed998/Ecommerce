<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Product;
use App\Review;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $users=User::all();
        $cates=Category::all();
        $products=Product::all();
        $reviews=Review::all();
        return view('layouts.admin.includes.content',[
            'users'=>$users,
            'cates' =>$cates,
            'products'=>$products,
            'reviews' => $reviews
            ]);
    }


}

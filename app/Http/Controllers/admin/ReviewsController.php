<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Review;
use Illuminate\Http\Request;

class ReviewsController extends Controller
{


    public function index(){
        $reviews=Review::paginate(PAGINATION_COUNT);
        return view('layouts.admin.reviews.index',['reviews' => $reviews]);
    }


    public function delete($id){
        $delReview=Review::findOrFail($id);
        $delReview->delete();

        return redirect()->route('admin.reviews');
    }



}

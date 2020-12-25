<?php

namespace App\Http\Controllers\site;


use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ReviewRequest;
use App\Product;
use App\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;


class SiteController extends Controller
{



     public function index(){
         $categories=Category::select('categories.*','cate_name_'.app()->getLocale() . ' as category_name')->where([ ['status','=',1] ,['parent_id','=',0] ])->get();
         $products=Product::select('products.*',
                                   'name_'.app()->getLocale() . ' as product_name',
                                   'description_' . app()->getLocale() . ' as product_desc'
         )->where('status','=',1)->get();
         return view('layouts.site.content.content',[
             'categories' =>$categories,
             'products'=>$products
         ]);
     }

                  ////////////////////////////////////////////////////////////////////////////////////////

     public function show($id){
         $showProduct=Product::findOrFail($id);
         $categories=Category::where([ ['status','=',1] ,['parent_id','=',0] ])->get();
         $currentUser=Auth::user();

         return view('layouts.site.content.product',[
             'showProduct' => $showProduct,
             'categories' => $categories,
             'user' => $currentUser

         ]);
     }

     //////////////////////////////////////////////////////////////////

    public function saveReview(Request $request){
        $id=$request['product_id'];
        Review::create([
            'product_id' =>$request['product_id'],
             'user_id'   =>$request['user_id'],
            'comment'    =>$request['comment'],
            'stars'      =>$request['rating']
        ]);

        return redirect()->route('site.product.show',$id)->with('success','Your review has been published');

    }

/////////////////////////////////////////////////////////////////////////////////////////////////


public function deleteReview($id){
         $del=Review::findOrFail($id);
         $del->delete();
    return redirect()->route('site.product.show',$del->product_id)->with('success','Your review has been removed');

}

/////////////////////////////////////////////////////////////////////////////////////////////////

    public function categoryShow($id){
         $category=Category::findOrFail($id);
         return view('layouts.site.content.category',['category'=>$category]);
    }

////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function main(){
         $categories=Category::all();
         $products=Product::paginate(PAGINATION_COUNT);
         return view('layouts.site.content.main',[
             'categories' => $categories,
             'products' => $products
         ]);
    }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

     public function ShowCart(){

         return view('layouts.site.content.cart');
     }

/////////////////////////////////////////////////////////////////////////////////////////////////////////////

    public function addToCart($id)
    {
        $product = Product::find($id);

        if(!$product) {

            abort(404);

        }

        $cart = session()->get('cart');

        // if cart is empty then this the first product
        if(!$cart) {

            $cart = [
                $id => [
                    "name" => $product->name_en,
                    "quantity" => 1,
                    "price" => $product->price,
                    "photo" => $product->main_image
                ]
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }

        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {

            $cart[$id]['quantity']++;

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');

        }

        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "name" => $product->name_en,
            "quantity" => 1,
            "price" => $product->price,
            "photo" => $product->main_image
        ];

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }



/////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function updateCart(Request $request)
    {
        if($request->id and $request->quantity)
        {
            $cart = session()->get('cart');

            $cart[$request->id]["quantity"] = $request->quantity;

            session()->put('cart', $cart);

            session()->flash('success', 'Cart updated successfully');
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function removeCart(Request $request)
    {
        if($request->id) {

            $cart = session()->get('cart');

            if(isset($cart[$request->id])) {

                unset($cart[$request->id]);

                session()->put('cart', $cart);
            }

            session()->flash('success', 'Product removed successfully');
        }
    }


/////////////////////////////////////////////////////////////////////////////////////////////////////////////


public function filterByCategory(Request  $request){
    if ($request->ajax()) {

        $ids = $request->selected_ids;
        $products = Product::wherein('category_id', explode(',', $ids))->get();

        if (isset($request->minimum_price) && isset($request->maximum_price)) {
            $products = Product::whereBetween('price', [$request->minimum_price, $request->maximum_price]);
        }

        $products = $products->get();
        $prod = view('layouts.site.content.main', ['products' => $products])->render();
        return response()->json(['prod' => $prod]);


    }

  }










}

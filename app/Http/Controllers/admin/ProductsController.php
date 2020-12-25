<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductsController extends Controller
{

    public  function index(){
        $products=Product::paginate(PAGINATION_COUNT);
        return view('layouts.admin.products.index',['products' => $products]);
    }


    //////////////////////////////////////////////////////////////////////////////////////////////////////////


    public function create(){
        $cates=Category::all();

        return view('layouts.admin.products.create',[
            'cates' => $cates
        ]);

    }

    ///////////////////////////////////////////STORE///////////////////////////////////////////////////////////////


    public function store(ProductRequest $request){
        //save main image in products folder
        $main_img_extension=$request->main_image->getClientOriginalExtension();
        $main_img_name= time() . "." . $main_img_extension;
        $path= 'uploads/products';
        $request->main_image->move($path,$main_img_name);
        // save sub-images in products folder
        $images=array();
        if($files=$request->file('sub_images')){ 
            foreach($files as $file){
                $exten=$file->getClientOriginalExtension();
                $img_name= date('YmdHis') . rand(0,100) . '.' . $exten;
                $path='uploads/products';
                $file->move($path,$img_name);
                $images[]=$img_name;
            }
        }
        $allImages = implode("|",$images);
        $allcolors=$request->colors;
        $colors=implode(",",$allcolors);
        Product::create([
            'name_en' => $request['name_en'],
            'name_ar' => $request['name_ar'],
            'description_en' => $request['description_en'],
            'description_ar' => $request['description_ar'],
            'status'=> $request['status'],
            'brand'=> $request['brand'],
            'quantity' => $request['quantity'],
            'colors' => $colors,
            'size'=>$request['size'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'main_image' =>  $main_img_name,
            'sub_images' =>  $allImages
        ]);
        return redirect()->route('admin.products')->with('success','Product has been added successfully');
    }

    //////////////////////////////////////////////EDIT////////////////////////////////////////////////////////////

    public function edit($id){
        $editProduct= Product::findOrFail($id);
        $cates=Category::all();
        $selectedColors=explode(',',$editProduct->colors);
        return view('layouts.admin.products.edit',[
            'cates' => $cates,
            'editProduct' => $editProduct,
            'selectedColors' =>$selectedColors
        ]);
    }

    ///////////////////////////////////////////////UPDATE///////////////////////////////////////////////////////////

    public function update(ProductRequest $request , $id){
      $updatedProduct=Product::findOrFail($id);



        //check if want to update main-images & sub-images

    if ($request->has('main_image') and $request->has( 'sub_images')  and $request->has('colors')){

            //delete old sub-images and replace it with new ones
            foreach(explode("|",$updatedProduct->sub_images) as $image) {
                File::delete('uploads/products/' . $image);
            }

            //delete the old main image and replace with new one
            File::delete('uploads/products/'.$updatedProduct->main_image);


            //save main image in products folder
            $main_img_extension=$request->main_image->getClientOriginalExtension();
            $main_img_name= time() . "." . $main_img_extension;
            $path= 'uploads/products';
            $request->main_image->move($path,$main_img_name);

            // save sub-images in products folder
            $images=array();
            if($files=$request->file('sub_images')){
                foreach($files as $file){

                    $exten=$file->getClientOriginalExtension();
                    $img_name= date('YmdHis') . rand(0,100) . '.' . $exten;
                    $path2='uploads/products';
                    $file->move($path2,$img_name);
                    $images[]=$img_name;
                }
            }

            $allImages = implode("|",$images);

                $allcolors = $request->colors;
                $colors=implode(",",$allcolors);




            $updatedProduct->update([
                'name_en' => $request['name_en'],
                'name_ar' => $request['name_ar'],
                'description_en' => $request['description_en'],
                'description_ar' => $request['description_ar'],
                'status'=> $request['status'],
                'brand'=> $request['brand'],
                'quantity' => $request['quantity'],
                'colors' => $colors,
                'size'=>$request['size'],
                'price' => $request['price'],
                'category_id' => $request['category_id'],
                'main_image' => $main_img_name,
                'sub_images' =>  $allImages,
            ]);



            return redirect()->route('admin.edit.product',$id)->with('success','Product has been updated successfully');


        }

      elseif ($request->has('main_image') and $request->has( 'sub_images') ){

          //delete old sub-images and replace it with new ones
          foreach(explode("|",$updatedProduct->sub_images) as $image) {
              File::delete('uploads/products/' . $image);
          }

          //delete the old main image and replace with new one
          File::delete('uploads/products/'.$updatedProduct->main_image);


          //save main image in products folder
          $main_img_extension=$request->main_image->getClientOriginalExtension();
          $main_img_name= time() . "." . $main_img_extension;
          $path= 'uploads/products';
          $request->main_image->move($path,$main_img_name);

          // save sub-images in products folder
          $images=array();
          if($files=$request->file('sub_images')){
              foreach($files as $file){

                  $exten=$file->getClientOriginalExtension();
                  $img_name= date('YmdHis') . rand(0,100) . '.' . $exten;
                  $path2='uploads/products';
                  $file->move($path2,$img_name);
                  $images[]=$img_name;
              }
          }

          $allImages = implode("|",$images);




          $updatedProduct->update([
              'name_en' => $request['name_en'],
              'name_ar' => $request['name_ar'],
              'description_en' => $request['description_en'],
              'description_ar' => $request['description_ar'],
              'status'=> $request['status'],
              'brand'=> $request['brand'],
              'quantity' => $request['quantity'],
              'size'=>$request['size'],
              'price' => $request['price'],
              'category_id' => $request['category_id'],
              'main_image' => $main_img_name,
              'sub_images' =>  $allImages,
          ]);



          return redirect()->route('admin.edit.product',$id)->with('success','Product has been updated successfully');


      }

        //check if want update main image for product
      elseif($request->has('main_image') and $request->has('colors')){
        //delete the old main image
        File::delete('uploads/products/'.$updatedProduct->main_image);
        //save main image in products folder
        $main_img_extension=$request->main_image->getClientOriginalExtension();
        $main_img_name= time() . "." . $main_img_extension;
        $path= 'uploads/products';
        $request->main_image->move($path,$main_img_name);

        $allcolors = $request->colors;
        $colors=implode(',',$allcolors);

        $updatedProduct->update([
            'name_en' => $request['name_en'],
            'name_ar' => $request['name_ar'],
            'description_en' => $request['description_en'],
            'description_ar' => $request['description_ar'],
            'status'=> $request['status'],
            'brand'=> $request['brand'],
            'colors' => $colors,
            'quantity' => $request['quantity'],
            'size'=>$request['size'],
            'price' => $request['price'],
            'category_id' => $request['category_id'],
            'main_image' =>  $main_img_name,
        ]);



        return redirect()->route('admin.edit.product',$id)->with('success','Product has been updated successfully');
        /////////////////////////////////////////////////////////////////
    }

      elseif($request->has('main_image')){
          //delete the old main image
          File::delete('uploads/products/'.$updatedProduct->main_image);
          //save main image in products folder
          $main_img_extension=$request->main_image->getClientOriginalExtension();
          $main_img_name= time() . "." . $main_img_extension;
          $path= 'uploads/products';
          $request->main_image->move($path,$main_img_name);



          $updatedProduct->update([
              'name_en' => $request['name_en'],
              'name_ar' => $request['name_ar'],
              'description_en' => $request['description_en'],
              'description_ar' => $request['description_ar'],
              'status'=> $request['status'],
              'brand'=> $request['brand'],
              'quantity' => $request['quantity'],
              'size'=>$request['size'],
              'price' => $request['price'],
              'category_id' => $request['category_id'],
              'main_image' =>  $main_img_name,
          ]);



          return redirect()->route('admin.edit.product',$id)->with('success','Product has been updated successfully');
          /////////////////////////////////////////////////////////////////
      }


      //check if want update sub-images for product
      elseif ($request->has('sub_images') and $request->has('colors')){
          //delete old sub-images and replace it with new ones
          foreach(explode("|",$updatedProduct->sub_images) as $image) {
              File::delete('uploads/products/' . $image);
          }
          // save sub-images in products folder
          $images=array();
          if($files=$request->file('sub_images')){
              foreach($files as $file){

                  $exten=$file->getClientOriginalExtension();
                  $img_name= date('YmdHis') . rand(0,100) . '.' . $exten;
                  $path='uploads/products';
                  $file->move($path,$img_name);
                  $images[]=$img_name;
              }
          }

          $allImages = implode("|",$images);

          $allcolors = $request->colors;
          $colors=implode(',',$allcolors);

          $data=$updatedProduct->update([
              'name_en' => $request['name_en'],
              'name_ar' => $request['name_ar'],
              'description_en' => $request['description_en'],
              'description_ar' => $request['description_ar'],
              'status'=> $request['status'],
              'brand'=> $request['brand'],
              'quantity' => $request['quantity'],
              'colors' => $colors,
              'size'=>$request['size'],
              'price' => $request['price'],
              'category_id' => $request['category_id'],
              'sub_images' =>  $allImages,
          ]);



          return redirect()->route('admin.edit.product',$id)->with('success','Product has been updated successfully');

          ////////////////////////////////////////////

      }

      elseif ($request->has('sub_images')){
          //delete old sub-images and replace it with new ones
          foreach(explode("|",$updatedProduct->sub_images) as $image) {
              File::delete('uploads/products/' . $image);
          }
          // save sub-images in products folder
          $images=array();
          if($files=$request->file('sub_images')){
              foreach($files as $file){

                  $exten=$file->getClientOriginalExtension();
                  $img_name= date('YmdHis') . rand(0,100) . '.' . $exten;
                  $path='uploads/products';
                  $file->move($path,$img_name);
                  $images[]=$img_name;
              }
          }

          $allImages = implode("|",$images);



        $updatedProduct->update([
              'name_en' => $request['name_en'],
              'name_ar' => $request['name_ar'],
              'description_en' => $request['description_en'],
              'description_ar' => $request['description_ar'],
              'status'=> $request['status'],
              'brand'=> $request['brand'],
              'quantity' => $request['quantity'],
              'size'=>$request['size'],
              'price' => $request['price'],
              'category_id' => $request['category_id'],
              'sub_images' =>  $allImages,
          ]);



          return redirect()->route('admin.edit.product',$id)->with('success','Product has been updated successfully');

          ////////////////////////////////////////////

      }

      //check if want update only colors
      elseif ($request->has('colors')){

          $allcolors = $request->colors;
          $colors = implode(",", $allcolors);


          $data=$updatedProduct->update([
              'name_en' => $request['name_en'],
              'name_ar' => $request['name_ar'],
              'description_en' => $request['description_en'],
              'description_ar' => $request['description_ar'],
              'status'=> $request['status'],
              'brand'=> $request['brand'],
              'quantity' => $request['quantity'],
              'colors' => $colors,
              'size'=>$request['size'],
              'price' => $request['price'],
              'category_id' => $request['category_id'],
      ]);
          return redirect()->route('admin.edit.product',$id)->with('success','Product has been updated successfully');

      }

      else{

          $updatedProduct->update([
              'name_en' => $request['name_en'],
              'name_ar' => $request['name_ar'],
              'description_en' => $request['description_en'],
              'description_ar' => $request['description_ar'],
              'status'=> $request['status'],
              'brand'=> $request['brand'],
              'quantity' => $request['quantity'],
//              'colors' => $request['colors'],
              'size'=>$request['size'],
              'price' => $request['price'],
              'category_id' => $request['category_id'],
          ]);

          return redirect()->route('admin.edit.product',$id)->with('success','Product has been updated successfully');

      }


    }


    ////////////////////////////////////////////////DELETE//////////////////////////////////////////////////////////

    public function delete($id){

        $delProduct=Product::findOrFail($id);
        File::delete('uploads/products/'.$delProduct->main_image);
        foreach(explode("|",$delProduct->sub_images) as $image) {
            File::delete('uploads/products/' . $image);
        }

        $delProduct->delete();
        return redirect()->route('admin.products')->with('success','Product has been removed successfully');

    }

    //////////////////////////////////////////////////////////////////////////////////////////////////////////










}

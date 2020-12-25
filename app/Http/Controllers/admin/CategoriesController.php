<?php

namespace App\Http\Controllers\admin;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CategoriesController extends Controller
{

    public function index(){
        $allcates=Category::all();
        $cates=Category::where('parent_id','=',0)->paginate(PAGINATION_COUNT);
        $subcates=Category::all();
        return view('layouts.admin.categories.index',['cates'=>$cates,
            'subcates'=>$subcates,
            'allcates'=>$allcates

        ]);
    }

    public function create(){
        $cates=Category::where('parent_id','=',0)->get();
        return view('layouts.admin.categories.create',['cates'=>$cates]);
    }


    public function store(CategoryRequest $request){

        //save photo in categories folder
        $file_extension= $request->cate_image->getClientOriginalExtension();
        $file_name=time() . "." .$file_extension;
        $path='uploads/categories';
        $request->cate_image->move($path,$file_name);

            Category::create([
                'cate_name_en'=>$request['cate_name_en'],
                'cate_name_ar'=>$request['cate_name_ar'],
                'cate_desc_en'=>$request['cate_desc_en'],
                'cate_desc_ar'=>$request['cate_desc_ar'],
                'parent_id'=>$request['parent_id'],
                'status'=>$request['status'],
                'cate_image' => $file_name
            ]);

            return redirect()->route('admin.categories')
                ->with('success','Category has been added successfully');

    }



    public function edit($id){
        $editCate=Category::findOrFail($id);
        $cates=Category::where('parent_id','=',0)->get();
        return view('layouts.admin.categories.edit',
            [
                'editCate'=>$editCate,
                'cates' =>$cates
            ]);
    }




    public function update(CategoryRequest $request , $id){
      $updateCate=Category::findOrFail($id);

        //save photo in categories folder
        if($request->has('cate_image')) {

            File::delete('uploads/categories/'.$updateCate->cate_image);

            $file_extension = $request->cate_image->getClientOriginalExtension();
            $file_name = time() . "." . $file_extension;
            $path = 'uploads/categories';
            $request->cate_image->move($path, $file_name);




            $updateCate->update([
                'cate_name_en'=>$request['cate_name_en'],
                'cate_name_ar'=>$request['cate_name_ar'],
                'cate_desc_en'=>$request['cate_desc_en'],
                'cate_desc_ar'=>$request['cate_desc_ar'],
                'parent_id'=>$request['parent_id'],
                'status'=>$request['status'],
                'cate_image'=> $file_name
            ]);
            return redirect()->route('admin.edit.category',$id)->with('success','Category has been updated successfully');
        }

            $updateCate->update([
                'cate_name_en'=>$request['cate_name_en'],
                'cate_name_ar'=>$request['cate_name_ar'],
                'cate_desc_en'=>$request['cate_desc_en'],
                'cate_desc_ar'=>$request['cate_desc_ar'],
                'parent_id'=>$request['parent_id'],
                'status'=>$request['status'],

            ]);
            return redirect()->route('admin.edit.category',$id)->with('success','Category has been updated successfully');

    }





    public function delete($id){
        $delcate=Category::findOrFail($id);
        File::delete('uploads/categories/'.$delcate->cate_image);
        $delcate->delete();
        return redirect()->route('admin.categories')->with('success','Category has been removed successfully');
    }


}

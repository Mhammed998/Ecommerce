@extends('layouts.admin.index')
@section('title','Dashboard | Categories')
@section('heading','Edit Category')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Category</h4>
                            <p class="card-category">Edit these fields</p>
                        </div>

                        <div class="card-body">
                            @include('alerts.flash')

                            <form action="{{route('admin.update.category',$editCate->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">

                                    <div class="col-md-12">
                                        Category Image:
                                        <input name="cate_image" type="file"  class="form-control">

                                        @error("cate_image")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mt-3">
                                      <div class="row">
                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name in english</label>
                                            <input value="{{$editCate->cate_name_en}}" name="cate_name_en" type="text" class="form-control">

                                            @error("cate_name_en")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>
                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description in english</label>
                                            <textarea name="cate_desc_en"  class="form-control">{{$editCate->cate_desc_en}}</textarea>

                                            @error("cate_desc_en")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>
                                      </div>
                                    </div>

                                    <!--  -->

                                    <div class="col-md-6 mt-3">
                                        <div class="row">
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name in arabic</label>
                                            <input value="{{$editCate->cate_name_ar}}" name="cate_name_ar" type="text" class="form-control">
                                            @error("cate_name_ar")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description in arabic</label>
                                            <textarea name="cate_desc_ar"  class="form-control">{{$editCate->cate_desc_ar}}</textarea>

                                            @error("cate_desc_en")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-6 mt-2">
                                        <div class="form-group">
                                            <label>Category type</label>
                                            <select class="form-control" name="parent_id">
                                                <option style="color:#222;" value="0">Main category</option>
                                                @foreach($cates as $cate)
                                                    <option
                                                        @if($editCate->parent_id == $cate->id ) selected @endif
                                                        style="color:#222;" value="{{$cate->id}}">{{$cate->cate_name_en}}</option>
                                                @endforeach
                                            </select>
                                            @error("parent_id")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-6 mt-2">
                                            <div class="form-group">
                                                    <label>Category Status</label>
                                                    <select class="form-control" name="status">
                                                        <option {{$editCate->status == 1 ? "selected" :"" }} style="color:#222;" value="1">Active</option>
                                                        <option {{$editCate->status == 0 ? "selected" :"" }} style="color:#222;" value="0">Not-active</option>
                                                    </select>
                                            </div>
                                    </div>

                                </div>




                                <button type="submit" class="btn btn-primary pull-right"> Save Updates </button>
                                <div class="clearfix"></div>

                            </form>


                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div  class="view text-center">

                        <img src="{{asset('uploads/categories/' . $editCate->cate_image)}}" alt="category-image" class="img-thumbnail">
                       <div style="border:1px solid #646979;border-radius: 10px;margin-top:5px;">
                            <h4 class="text-white mt-2">{{$editCate->cate_name_en}}</h4>
                            <h5 class="text-white">
                                @if($editCate->parent_id == 0)
                                    Main category
                                @else
                                    Child category of {{\App\Category::where('id','=',$editCate->parent_id)->first()->cate_name_en  }}
                                @endif
                            </h5>
                            <h5 class="text-white">
                                products : {{$editCate->products->count()}}
                            </h5>
                       </div>

                    </div>
                </div>

                </div>

            </div>
        </div>
    </div>























@endsection

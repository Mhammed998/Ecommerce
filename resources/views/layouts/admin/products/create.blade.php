@extends('layouts.admin.index')
@section('title','Dashboard | Products')
@section('heading','Create New Product')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Product</h4>
                            <p class="card-category">Complete these fields</p>
                        </div>

                        <div class="card-body">

                            <form action="{{route('admin.store.product')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-6">
                                            Main Image *:
                                            <input name="main_image" type="file"  class="form-control" required>

                                            @error("main_image")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>

                                    <div class="col-md-6">
                                        Sub-Images:
                                        <input name="sub_images[]" type="file"  class="form-control" multiple required>

                                        @error("sub_images")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 mt-3">
                                      <div class="row">
                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name in english</label>
                                            <input name="name_en" type="text" class="form-control" autocomplete="off">

                                            @error("name_en")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>
                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description in english</label>
                                            <textarea name="description_en"  class="form-control"></textarea>

                                            @error("description_en")
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
                                            <input name="name_ar" type="text" class="form-control" autocomplete="off">
                                            @error("name_ar")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description in arabic</label>
                                            <textarea name="description_ar"  class="form-control"></textarea>

                                            @error("description_ar")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label>Category: </label>
                                            <select class="form-control" name="category_id">
                                                @if($cates->count() !== 0)
                                                    <option style="color:#222;" disabled>select category</option>
                                                    @foreach($cates->where('parent_id','=',0) as $cate)
                                                        <option style="color:#222;"     value="{{$cate->id}}">{{$cate->cate_name_en}}</option>
                                                        @foreach($cates->where('parent_id','=',$cate->id) as $sub)
                                                            <option style="color:#222;"

                                                                    value="{{$sub->id}}">---{{$sub->cate_name_en}}</option>
                                                        @endforeach
                                                    @endforeach

                                                @else
                                                    <option>No Categories Exist</option>
                                            @endif

                                            </select>
                                            @error("category_id")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror


                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                            <div class="form-group">
                                                <label>Product Status</label>
                                                <select class="form-control" name="status">
                                                    <option style="color:#222;" value="1">Active</option>
                                                    <option style="color:#222;" value="0">Not-active</option>
                                                </select>
                                            </div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <input name="brand" type="text" class="form-control" autocomplete="off">

                                            @error("brand")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div class="col-md-2 mt-2">
                                        <div class="form-group">
                                            <label>Colors</label>
                                            <select style="height: 100px;;" name="colors[]" class="form-control"  multiple>
                                                <option style="color: #fff" value="0">Select colors</option>
                                                <option class="red" value="#ff0000"    style="background-color: #ff0000" >red</option>
                                                <option class="blue" value="#0000ff"  style="background-color: #0000ff">blue</option>
                                                <option class="green" value="#008000"  style="background-color: #008000">green</option>
                                                <option class="orange" value="#ffa500" style="background-color: #ffa500">orange</option>
                                                <option class="yellow" value="#ffff00" style="background-color: #ffff00">yellow</option>
                                                <option class="black" value="#000"     style="background-color: #000">black</option>
                                                <option class="grey" value="#808080"   style="background-color: #808080">grey</option>
                                                <option class="white" value="#fff"     style="background-color: #fff">white</option>
                                                <option class="brown" value="#a52a2a"  style="background-color: #a52a2a">brown</option>
                                                <option class="bink" value="#ffc0cb"   style="background-color: #ffc0cb">bink</option>
                                                <option class="gold" value="#ffd700"   style="background-color: #ffd700">gold</option>
                                                <option class="purple" value="#800080" style="background-color: #800080">purple</option>
                                            </select>

                                            @error("color")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input name="price" type="text" class="form-control" autocomplete="off">

                                            @error("price")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input name="quantity" type="text" class="form-control" autocomplete="off">

                                            @error("quantity")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label>Size</label>
                                            <input autocomplete="off" placeholder="enter sizes seprated by ',' " name="size" type="text" class="form-control">

                                            @error("size")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                </div>




                                <button type="submit" class="btn btn-primary pull-right"> Save Product </button>
                                <div class="clearfix"></div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>























@endsection

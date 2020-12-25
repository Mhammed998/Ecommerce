@extends('layouts.admin.index')
@section('title','Dashboard | Products')
@section('heading','Edit Product')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">



                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <div class="d-inline-block text-left">
                            <h4 class="card-title">Edit Product</h4>
                            <p class="card-category">Edit these fields</p>
                            </div>

                            <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target=".bd-example-modal-lg">View Product</button>
                            @include('alerts.flash')
                        </div>

                        <div class="card-body">

                            <form action="{{route('admin.update.product',$editProduct->id)}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">

                                    <div class="col-md-6">
                                        Main Image :
                                        <input name="main_image" type="file"  class="form-control">

                                        @error("main_image")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="col-md-6">
                                        Sub-Images:
                                        <input name="sub_images[]" type="file"  class="form-control" multiple>

                                        @error("sub_images")
                                        <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>


                                    <div class="col-md-6 mt-3">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Name in english</label>
                                                    <input autocomplete="off" value="{{$editProduct->name_en}}" name="name_en" type="text" class="form-control">

                                                    @error("name_en")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description in english</label>
                                                    <textarea name="description_en"  class="form-control">{{$editProduct->description_en}}</textarea>

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
                                                    <input autocomplete="off" value="{{$editProduct->name_ar}}" name="name_ar" type="text" class="form-control">
                                                    @error("name_ar")
                                                    <span class="text-danger">{{$message}}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description in arabic</label>
                                                    <textarea name="description_ar"  class="form-control">{{$editProduct->description_en}}</textarea>

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
                                                        <option class="text-primary" style="color:#222;"     @if($cate->id == $editProduct->category_id)
                                                                     selected
                                                                     @endif value="{{$cate->id}}">{{$cate->cate_name_en}}</option>
                                                        @foreach($cates->where('parent_id','=',$cate->id) as $sub)
                                                            <option style="color:#222;"
                                                                @if($sub->id == $editProduct->category_id)
                                                                selected
                                                                @endif
                                                                value="{{$sub->id}}">--{{$sub->cate_name_en}}</option>
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
                                                <option {{$editProduct->status == 1 ? 'selected' : ''}} style="color:#222;" value="1">Active</option>
                                                <option {{$editProduct->status == 0 ? 'selected' : ''}} style="color:#222;" value="0">Not-active</option>
                                                @error("status")
                                                <span class="text-danger">{{$message}}</span>
                                                @enderror
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label>Brand</label>
                                            <input autocomplete="off" value="{{$editProduct->brand}}" name="brand" type="text" class="form-control">

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
                                            <select style="height: 100px;" name="colors[]" class="form-control"  multiple>
                                                <option style="color: #fff">Select colors</option>

                                                <option @if(in_array('#ff0000',$selectedColors)) selected @endif  class="red" value="#ff0000"    style="background-color: #ff0000" >red</option>
                                                <option @if(in_array('#0000ff',$selectedColors)) selected @endif  class="blue" value="#0000ff"  style="background-color: #0000ff">blue</option>
                                                <option @if(in_array('#008000',$selectedColors)) selected @endif  class="green" value="#008000"  style="background-color: #008000">green</option>
                                                <option @if(in_array('#ffa500',$selectedColors)) selected @endif  class="orange" value="#ffa500" style="background-color: #ffa500">orange</option>
                                                <option @if(in_array('#ffff00',$selectedColors)) selected @endif  class="yellow" value="#ffff00" style="background-color: #ffff00">yellow</option>
                                                <option @if(in_array('#000',$selectedColors)) selected @endif class="black" value="#000"     style="background-color: #000">black</option>
                                                <option @if(in_array('#808080',$selectedColors)) selected @endif class="grey" value="#808080"   style="background-color: #808080">grey</option>
                                                <option @if(in_array('#fff',$selectedColors)) selected @endif   class="white" value="#fff"  style="background-color: #fff;">white</option>
                                                <option @if(in_array('#a52a2a',$selectedColors)) selected @endif  class="brown" value="#a52a2a"  style="background-color: #a52a2a">brown</option>
                                                <option @if(in_array('#ffc0cb',$selectedColors)) selected @endif  class="bink" value="#ffc0cb"   style="background-color: #ffc0cb">bink</option>
                                                <option @if(in_array('#ffd700',$selectedColors)) selected @endif  class="gold" value="#ffd700"   style="background-color: #ffd700">gold</option>
                                                <option @if(in_array('#800080',$selectedColors)) selected @endif  class="purple" value="#800080" style="background-color: #800080">purple</option>
                                            </select>

                                            @error("colors")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>


                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input autocomplete="off" value="{{$editProduct->price}}" name="price" type="text" class="form-control">

                                            @error("price")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-3 mt-2">
                                        <div class="form-group">
                                            <label>Quantity</label>
                                            <input autocomplete="off" value="{{$editProduct->quantity}}" name="quantity" type="text" class="form-control">

                                            @error("quantity")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                    <div class="col-md-4 mt-2">
                                        <div class="form-group">
                                            <label>Size</label>
                                            <input autocomplete="off" value="{{$editProduct->size}}" name="size" type="text" class="form-control">

                                            @error("size")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>



                                </div>




                                <button type="submit" class="btn btn-primary pull-right"> Save Updates </button>
                                <div class="clearfix"></div>

                            </form>


                        </div>


                    </div>
                </div>



            </div>
        </div>
    </div>




    <!-- Large modal -->

    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">View Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                   <div class="row">

                       <div class="col-md-4">
                           <div class="gallery text-center">

                               <img name="preview" id="img-preview"  src="{{asset('uploads/products/' . $editProduct->main_image)}}" alt="product-image" class="img-thumbnail">

                                <div class="d-inline-block text-center mt-1">
                                  @if(isset($editProduct->sub_images))
                                    @foreach(explode("|",$editProduct->sub_images) as $image)

                                      <img onmousemove="preview.src = this.src"  class="img-thumbnail" height="50" width="50" src="{{asset('uploads/products/' . $image)}}">

                                    @endforeach
                                        <img height="50" width="50" onmousemove="preview.src = this.src"  src="{{asset('uploads/products/' . $editProduct->main_image)}}" alt="product-image" class="img-thumbnail">
                                  @endif

                                </div>
                               <h6 class="mt-2">Created at: {{$editProduct->created_at->format('d-m-Y')}}</h6>
                               <h6>Updated at: {{$editProduct->updated_at->format('d-m-Y')}}</h6>
                           </div>
                       </div>

                       <div class="col-md-8">
                           <div class="info">
                               <h3>{{$editProduct->name_en}}</h3>
                               <h2 class="text-primary">{{$editProduct->price}} L.E</h2>
                               <p>{{$editProduct->description_en}}</p>
                               <h4>Category: {{$editProduct->category->cate_name_en}} </h4>
                               <h4>Brand: {{$editProduct->brand}} </h4>
                               <div>
                                   <h4 class="d-inline-block"> Colors:</h4>
                                   @foreach(explode(",",$editProduct->colors) as $color)
                                   <span style="width:18px;height: 18px;border-radius: 50%;background-color:{{$color}};display:inline-block;margin-left: 3px;border:2px solid #ccc "></span>
                                   @endforeach
                               </div>
                               <h4>Quantity:  {{$editProduct->quantity}} </h4>
                               <h4 class="d-inline-block">Size:</h4>
                               <select  name="size">
                               @foreach(explode(',',$editProduct->size) as $size)
                                   <option value="{{$size}}">{{$size}}</option>
                               @endforeach
                               </select>
                               <h4>Status: <span class="badge badge-danger">{{$editProduct->status == "1" ? "Active" : "Hidden"}}</span> </h4>
                           </div>
                       </div>

                   </div>
                </div>
            </div>
        </div>
    </div>















@endsection

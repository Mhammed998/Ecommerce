@extends('layouts.admin.index')
@section('title','Dashboard | Categories')
@section('heading','Create New Category')
@section('content')

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-10">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Create Category</h4>
                            <p class="card-category">Complete these fields</p>
                        </div>

                        <div class="card-body">

                            <form action="{{route('admin.store.category')}}" method="post" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-12">
                                            Category Image:
                                            <input name="cate_image" type="file"  class="form-control" required>

                                            @error("cate_image")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                    </div>

                                    <div class="col-md-6 mt-3">
                                      <div class="row">
                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Name in english</label>
                                            <input name="cate_name_en" type="text" class="form-control">

                                            @error("cate_name_en")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror

                                        </div>
                                    </div>
                                         <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description in english</label>
                                            <textarea name="cate_desc_en"  class="form-control"></textarea>

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
                                            <input name="cate_name_ar" type="text" class="form-control">
                                            @error("cate_name_ar")
                                            <span class="text-danger">{{$message}}</span>
                                            @enderror
                                        </div>
                                    </div>
                                        <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Description in arabic</label>
                                            <textarea name="cate_desc_ar"  class="form-control"></textarea>

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
                                                    <option style="color:#222;" value="{{$cate->id}}">{{$cate->cate_name_en}}</option>
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
                                                    <option style="color:#222;" value="1">Active</option>
                                                    <option style="color:#222;" value="0">Not-active</option>
                                                </select>
                                            </div>
                                    </div>

                                </div>




                                <button type="submit" class="btn btn-primary pull-right"> Save Category </button>
                                <div class="clearfix"></div>

                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>























@endsection

@extends('layouts.admin.index')
@section('title','Dashboard | Categories')
@section('heading','Categories management')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-primary">
                      <div class="text-left d-inline-block">
                      <h4 class="card-title ">Categories Table</h4>
                      <p class="card-category"> Here You Can Do Operations on Categories</p>
                      </div>
                    <a href="{{route('admin.create.category')}}" class="btn btn-default float-right d-inline">New Category</a>
                    @include('alerts.flash')
                </div>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">

                            <thead class=" text-primary">

                            <th>
                                ID
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Description
                            </th>
                            <th>
                                Status
                            </th>
                            <th>
                              No. Products
                            </th>

                            <th>
                                Controls
                            </th>

                            </thead>
                            <tbody>

                                @if(isset($allcates) && $allcates->count() > 0)
                                @foreach($cates as $cate)
                                <tr title="main-category" class="table-active">
                                    <td>
                                        {{$cate->id}}
                                    </td>
                                    <td>
                                        {{$cate->cate_name_en}}
                                    </td>
                                    <td>
                                        {{$cate->cate_desc_en}}
                                    </td>
                                    <td class="text-warning">
                                        @if($cate->status == 1)  Active @else Not-active @endif
                                    </td>
                                    <td>
                                        {{$cate->products->count()}}
                                    </td>
                                    <td>
                                      <a href="{{route('admin.delete.category',$cate->id)}}" class="btn btn-danger btn-circle btn-sm">
                                          <i class=" fa fa-trash"></i>
                                      </a>

                                      <a href="{{route('admin.edit.category',$cate->id)}}" class="btn btn-success btn-circle btn-sm">
                                          <i class="  fa fa-pencil"></i>
                                      </a>
                                    </td>

                                </tr>

                                    @foreach($subcates->where('parent_id','=',$cate->id) as $child)
                                        <tr title="sub-category">
                                            <td>
                                                {{$child->id}}
                                            </td>
                                            <td>
                                                - {{$child->cate_name_en}}
                                            </td>
                                            <td>
                                                {{$child->cate_desc_en}}
                                            </td>
                                            <td class="text-warning">
                                                @if($child->status == 1)  Active @else Not-active @endif
                                            </td>
                                            <td>
                                                {{$child->products->count()}}
                                            </td>
                                            <td>
                                                <a href="{{route('admin.delete.category',$child->id)}}" class="btn btn-danger btn-circle btn-sm">
                                                    <i class=" fa fa-trash"></i>
                                                </a>

                                                <a href="{{route('admin.edit.category',$child->id)}}" class="btn btn-success btn-circle btn-sm">
                                                    <i class="  fa fa-pencil"></i>
                                                </a>
                                            </td>

                                        </tr>

                                    @endforeach

                                @endforeach
                                @else
                                    <tr>
                                        <td>There Is No Categories  Yet !</td>
                                    </tr>
                                @endif
                            <tr> {{$cates->links()}}  </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>















 @endsection

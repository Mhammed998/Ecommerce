@extends('layouts.admin.index')
@section('title','Dashboard | Products')
@section('heading','Products management')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header card-header-primary">
                    <div class="text-left d-inline-block">
                      <h4 class="card-title ">Products Table</h4>
                        <p class="card-category"> Here You Can Do Operations on Products</p>
                    </div>
                    <a href="{{route('admin.create.product')}}" class="btn btn-default float-right d-inline">New Product</a>
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
                                Image
                            </th>

                            <th>
                                Name
                            </th>

                            <th>
                                Colors
                            </th>

                            <th>
                                price
                            </th>

                            <th>
                                Quantity
                            </th>

                            <th>
                                Status
                            </th>

                            <th>
                                Category
                            </th>

                            <th>
                                Controls
                            </th>

                            </thead>
                            <tbody>

                                @if(isset($products) && $products->count() > 0)
                                @foreach($products as $product)
                                <tr>
                                    <td>
                                        {{$product->id}}
                                    </td>
                                    <td>
                                       <img style="width:50px;height:50px;border-radius:5px ;" src="{{asset('uploads/products/' .$product->main_image)}}" alt="product-image">
                                    </td>
                                    <td>
                                        {{$product->name_en}}
                                    </td>
                                    <td>

                                        @foreach(explode(",",$product->colors) as $color)
                                            <span style="width:18px;height: 18px;border-radius: 50%;background-color:{{$color}};display:inline-block;margin-left: 3px;border:2px solid #ccc "></span>
                                        @endforeach
                                    </td>
                                    <td>
                                        {{$product->price}}
                                    </td>

                                    <td>
                                        {{$product->quantity}}
                                    </td>

                                    <td class="text-warning">
                                        @if($product->status == 1)  Active @else Not-active @endif
                                    </td>

                                    <td>
                                        {{$product->category->cate_name_en}}
                                    </td>

                                    <td>
                                      <a title="Delete" href="{{route('admin.delete.product',$product->id)}}" class="btn btn-danger btn-circle btn-sm">
                                          <i class=" fa fa-trash"></i>
                                      </a>

                                      <a  title="Edit" href="{{route('admin.edit.product',$product->id)}}" class="btn btn-success btn-circle btn-sm">
                                          <i class="  fa fa-pencil"></i>
                                      </a>
                                    </td>

                                </tr>
                                @endforeach
                                @else
                                    <tr class="text-warning"> There Is No Products Yet !</tr>
                                @endif
                            <tr> {{$products->links()}}</tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>















 @endsection

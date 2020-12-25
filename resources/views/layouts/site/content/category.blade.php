@extends('layouts.site.index')
@section('title','Electro')
@section('content')

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section" style="margin-bottom: 0;">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">All Categories</a></li>
                        <li><a href="#">{{$category->cate_name_en}}</a></li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->


    <section style="position:relative;background:black;background:linear-gradient(rgba(0,0,0,0.75),rgba(0,0,0,0.75)),url({{asset( 'uploads/categories/' . $category->cate_image)}});
        height:350px;margin-bottom: 20px;overflow: hidden;background-repeat: no-repeat;background-size: cover">
        <div class="container">
           <div class="caption text-center p-2 ">
               <h1 style="color:#fff;position: absolute;top:50%;left: 50%;transform: translate(-50%,-50%);">
                   {{$category->cate_name_en}}</h1>
           </div>
        </div>
    </section>


    <section class="category-product">
        <div class="row">
            <div class="col-md-3">
                <div class="filters">

                </div>
            </div>
            <div class="col-md-9">
                <div class="products">
                  <div class="row">
                @foreach($category->products as $product)
                    <div class="col-md-3">
                    <!-- product -->
                        <div class="product">
                            <div class="product-img">
                                <img src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                                <div class="product-label">
                                    <span class="sale">-30%</span>
                                    <span class="new">NEW</span>
                                </div>
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$product->category->cate_name_en}}</p>
                                <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->name_en}}</a></h3>
                                <h4 class="product-price">${{$product->price}}<del class="product-old-price">$990.00</del></h4>
                                <div class="product-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product-btns">
                                    <a href="#" class="btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</a>
                                </div>
                            </div>

                        </div>
                        <!-- /product -->
                    </div>
                    @endforeach


                  </div>
                </div>
            </div>

        </div>
    </section>

























@endsection

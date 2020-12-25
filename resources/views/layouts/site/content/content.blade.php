@extends('layouts.site.index')
@section('title','Electro')
@section('content')


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">


            @foreach($categories->slice(0,6) as $category)
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img height="230px" width="245px" src="{{asset('uploads/categories/' . $category->cate_image)}}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>{{$category->category_name }}<br>{{__("lang.collection")}}</h3>
                        <a href="{{route('users.category.show',$category->id)}}" class="cta-btn">{{__("lang.shop-now")}} <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
            @endforeach


        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{__("lang.new-products")}}</h3>

                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">


                                 @foreach($products as $product)
                                    <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="height:260px;" src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">{{__("lang.new")}}</span>
                                            </div>
                                        </div>

                                        <div class="product-body">
                                            <p class="product-category">{{$product->category->category_name}}</p>
                                            <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->product_name}}</a></h3>
                                            <h4 class="product-price">${{$product->price}}<del class="product-old-price">$990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <a  href="{{route('site.addToCart',$product->id)}}" class="btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i> {{__("lang.add-to-cart")}}</a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /product -->
                                 @endforeach



                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="hot-deal">
                    <ul class="hot-deal-countdown">
                        <li>
                            <div>
                                <h3>02</h3>
                                <span>{{__("lang.days")}}</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>10</h3>
                                <span>{{__("lang.hours")}}</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>34</h3>
                                <span>{{__("lang.mins")}}</span>
                            </div>
                        </li>
                        <li>
                            <div>
                                <h3>60</h3>
                                <span>{{__("lang.secs")}}</span>
                            </div>
                        </li>
                    </ul>
                    <h2 class="text-uppercase">hot deal this week</h2>
                    <p>New Collection Up to 50% OFF</p>
                    <a class="primary-btn cta-btn" href="#">{{__("lang.shop-now")}}</a>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{__("lang.top-sell")}}</h3>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <div id="tab2" class="tab-pane fade in active">
                            <div class="products-slick" data-nav="#slick-nav-2">
                            @foreach($products as $product)
                                <!-- product -->
                                    <div class="product">
                                        <div class="product-img">
                                            <img style="height:260px;" src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                                            <div class="product-label">
                                                <span class="sale">-30%</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">{{$product->category->category_name}}</p>
                                            <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->product_name}}</a></h3>
                                            <h4 class="product-price">${{$product->price}}<del class="product-old-price">$990.00</del></h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                                <a href="{{route('site.addToCart',$product->id)}}" class="btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</a>
                                            </div>
                                        </div>

                                    </div>
                                    <!-- /product -->
                                @endforeach
                            </div>
                            <div id="slick-nav-2" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- /Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">{{__("lang.top-sell")}}</h4>
                    <div class="section-nav">
                        <div id="slick-nav-3" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-3">

                    <div>
                        @foreach($products->slice(0,3) as $product )
                            <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$product->category->category_name}}</p>
                                    <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->product_name}}</a></h3>
                                    <h4 class="product-price">{{$product->price}} <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->
                         @endforeach
                    </div>

                    <div>
                    @foreach($products->slice(3,6) as $product )
                        <!-- product widget -->
                        <div class="product-widget">
                            <div class="product-img">
                                <img src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                            </div>
                            <div class="product-body">
                                <p class="product-category">{{$product->category->category_name}}</p>
                                <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->product_name}}</a></h3>
                                <h4 class="product-price">{{$product->price}} <del class="product-old-price">$990.00</del></h4>
                            </div>
                        </div>
                        <!-- /product widget -->
                    @endforeach
                    </div>

                </div>
            </div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">{{__("lang.top-sell")}}</h4>
                    <div class="section-nav">
                        <div id="slick-nav-4" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-4">
                    <div>
                    @foreach($products->slice(0,3) as $product )
                        <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$product->category->category_name}}</p>
                                    <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->product_name}}</a></h3>
                                    <h4 class="product-price">{{$product->price}} <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->
                        @endforeach
                    </div>

                    <div>
                    @foreach($products->slice(3,6) as $product )
                        <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$product->category->category_name}}</p>
                                    <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->product_name}}</a></h3>
                                    <h4 class="product-price">{{$product->price}} <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="clearfix visible-sm visible-xs"></div>

            <div class="col-md-4 col-xs-6">
                <div class="section-title">
                    <h4 class="title">{{__("lang.top-sell")}}</h4>
                    <div class="section-nav">
                        <div id="slick-nav-5" class="products-slick-nav"></div>
                    </div>
                </div>

                <div class="products-widget-slick" data-nav="#slick-nav-5">
                    <div>
                    @foreach($products->slice(0,3) as $product )
                        <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$product->category->category_name}}</p>
                                    <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->product_name}}</a></h3>
                                    <h4 class="product-price">{{$product->price}} <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->
                        @endforeach
                    </div>

                    <div>
                    @foreach($products->slice(3,6) as $product )
                        <!-- product widget -->
                            <div class="product-widget">
                                <div class="product-img">
                                    <img src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$product->category->category_name}}</p>
                                    <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->product_name}}</a></h3>
                                    <h4 class="product-price">{{$product->price}} <del class="product-old-price">$990.00</del></h4>
                                </div>
                            </div>
                            <!-- /product widget -->
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->

<!-- NEWSLETTER -->
<div id="newsletter" class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-12">
                <div class="newsletter">
                    <p>Sign Up for the <strong>NEWSLETTER</strong></p>
                    <form>
                        <input class="input" type="email" placeholder="Enter Your Email">
                        <button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
                    </form>
                    <ul class="newsletter-follow">
                        <li>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-pinterest"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /NEWSLETTER -->





@endsection

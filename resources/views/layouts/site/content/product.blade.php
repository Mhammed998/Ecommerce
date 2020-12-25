@extends('layouts.site.index')
@section('title','Electro | Product')
@section('content')


    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-md-12">
                    <ul class="breadcrumb-tree">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">All Categories</a></li>
                        <li><a href="#">{{$showProduct->category->cate_name_en}}</a></li>
                        <li class="active">{{$showProduct->name_en}}</li>
                    </ul>
                </div>
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product gallery img -->

                <div class="col-md-1 text-right mr-0">
                    <div class="subs text-right">
                            @if(isset($showProduct->sub_images))
                                @foreach(explode("|",$showProduct->sub_images) as $image)

                                    <img onmousemove="preview.src = this.src"  class="mt-1" height="70" width="70"
                                         src="{{asset('uploads/products/' . $image)}}">

                                @endforeach
                                <img  class="mt-1" height="70" width="70" onmousemove="preview.src = this.src"
                                     src="{{asset('uploads/products/' . $showProduct->main_image)}}" alt="product-image">
                            @endif


                    </div>
                </div>

                <div class="col-md-4">
                    <div class="main-image text-left">

                        <img style="width:360px;height: 360px;"   name="preview" id="img-preview"  src="{{asset('uploads/products/' . $showProduct->main_image)}}" alt="product-image" >



                    </div>
                </div>
                <!-- /Product gallery img -->


                <div class="col-md-7">
                    <div class="product-details">
                        <h2 class="product-name">{{$showProduct->name_en}}</h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">{{$showProduct->reviews->count()}} Review(s) | Add your review</a>
                        </div>
                        <div>
                            <h3 class="product-price">{{$showProduct->price}} <del class="product-old-price">$990.00</del></h3>
                            <span class="product-available">
                              @if($showProduct->quantity >= 1)  In Stock @else Not Available @endif
                            </span>
                        </div>
                        <p>
                            {{$showProduct->description_en}}
                        </p>

                        <div class="product-options">
                            <label>
                                Size
                                <select name="size" class="input-select">
                                    @foreach(explode(",",$showProduct->size) as $size)
                                    <option value="{{$size}}">{{$size}}</option>
                                    @endforeach
                                </select>
                            </label>
                            <label>
                                Colors
                                <select name="colors" class="input-select">
                                    @foreach(explode(",",$showProduct->colors) as $color)
                                    <option style="background-color:{{$color}} "  value="{{$color}}"></option>
                                    @endforeach
                                </select>
                            </label>
                        </div>

                        <div class="add-to-cart">

                            <a href="{{route('site.addToCart',$showProduct->id)}}" class="add-to-cart-btn btn"><i class="fa fa-shopping-cart"></i> add to cart</a>
                        </div>



                        <ul class="product-links">
                            <li>Category:</li>
                            <li><a href="#">{{$showProduct->category->cate_name_en}}</a></li>

                        </ul>

                        <ul class="product-links">
                            <li>Share:</li>
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-envelope"></i></a></li>
                        </ul>

                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
                            <li><a data-toggle="tab" href="#tab3">Reviews {{$showProduct->reviews->count()  }}</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <div id="tab1" class="tab-pane fade in active">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>
                                            {{$showProduct->description_en}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <!-- /tab1  -->



                            <!-- tab3  -->
                            <div id="tab3" class="tab-pane fade in">
                                <div class="row">
                                    <!-- Rating -->
                                    <div class="col-md-3">
                                        <div id="rating">
                                            <div class="rating-avg">
                                                <span>4.5</span>
                                                <div class="rating-stars">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star-o"></i>
                                                </div>
                                            </div>
                                            <ul class="rating">
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 80%;"></div>
                                                    </div>
                                                    <span class="sum">3</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div style="width: 60%;"></div>
                                                    </div>
                                                    <span class="sum">2</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                                <li>
                                                    <div class="rating-stars">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="rating-progress">
                                                        <div></div>
                                                    </div>
                                                    <span class="sum">0</span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Rating -->

                                    <!-- Reviews -->
                                    <div class="col-md-6">
                                        <div id="reviews">
                                            <ul class="reviews">

                                                @if($showProduct->reviews->count() > 0)
                                                @foreach($showProduct->reviews as $review)
                                                <li>
                                                    <div class="review-heading">
                                                        <h5 class="name">{{$review->user->name}}</h5>
                                                        <p class="date">{{$review->created_at->format('d-M-y')}}</p>
                                                        <div class="review-rating">
                                                            @if($review->stars == 1)
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            @elseif($review->stars == 2)
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            @elseif($review->stars == 3)
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            @elseif($review->stars == 4)
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star-o empty"></i>
                                                            @elseif($review->stars == 5)
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                                <i class="fa fa-star"></i>
                                                            @endif


                                                        </div>
                                                    </div>
                                                    <div style="display: inline-block" class="review-body">
                                                        <p>
                                                            {{$review->comment}}
                                                        </p>
                                                    </div>
                                                    @if($review->user_id === Auth::user()->id)
                                                     <form action="{{route('users.review.delete',$review->id)}}" method="POST">
                                                         @csrf
                                                         @method('DELETE')
                                                         <button style="margin-top: -65px;margin-right: 40px;display: inline-block;float: right;" type="submit"> <i class="fa fa-trash"></i></button>
                                                     </form>

                                                    @endif
                                                </li>
                                                @endforeach
                                                @else
                                                  No reviews Yet
                                                @endif


                                            </ul>
                                            <ul class="reviews-pagination">

                                            </ul>
                                        </div>
                                    </div>
                                    <!-- /Reviews -->


                                    <!-- Review Form -->
                                    <div class="col-md-3">
                                        @auth
                                        <div id="review-form">

                                            <form class="review-form" action="{{route('users.review.save')}}" method="post">
                                                @csrf

                                                <input name="product_id" type="hidden"  value="{{$showProduct->id}}">

                                                <input name="user_id" type="hidden" value="{{$user->id}}">

                                                <textarea name="comment" class="input" placeholder="Your Review Here" required></textarea>

                                                <div style="width:262px;" class="input-rating">
                                                    <span>Your Rating: </span>
                                                    <select name="rating">
                                                        <option id="star5" value="5" >
                                                           5 stars
                                                        </option>
                                                        <option id="star4" value="4">
                                                            4 stars
                                                        </option>
                                                        <option id="star3" value="3">
                                                            3 stars
                                                        </option>
                                                        <option id="star2" value="2">
                                                            2 stars
                                                        </option>
                                                        <option id="star1" value="1">
                                                            1 stars
                                                        </option>
                                                        <option id="star1" value="0">
                                                            0 stars
                                                        </option>
                                                    </select>

                                                </div>

                                                <button type="submit" class="primary-btn">Submit</button><br>

                                            </form>
                                            <br>
                                            @include('alerts.flash')
                                        </div>
                                        @elseauth
                                            <div class="alert alert-warning"> You should login to add review here
                                                <a href="{{route('login')}}">Login</a> | <a href="{{route('register')}}">Register</a>  </div>
                                        @endauth

                                    </div>
                                    <!-- /Review Form -->




                                </div>
                            </div>
                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->


    <!-- Section -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <div class="col-md-12">
                    <div class="section-title text-center">
                        <h3 class="title">Related Products</h3>
                    </div>
                </div>


                @foreach($showProduct->category->products as $relatedProduct)
                <!-- product -->
                <div class="col-md-3 col-xs-6">
                    <div class="product">
                        <div class="product-img">
                            <img src="{{asset('uploads/products/' . $relatedProduct->main_image)}}" alt="">
                            <div class="product-label">
                                <span class="sale">-30%</span>
                            </div>
                        </div>
                        <div class="product-body">
                            <p class="product-category">{{$relatedProduct->category->cate_name_en}}</p>
                            <h3 class="product-name"><a href="{{route('site.product.show',$relatedProduct->id)}}">{{$relatedProduct->name_en}}</a></h3>
                            <h4 class="product-price">$980.00 <del class="product-old-price">{{$relatedProduct->price}}</del></h4>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="product-btns">
                                <a href="{{route('site.addToCart',$showProduct->id)}}" class="btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- /product -->
                @endforeach


            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /Section -->




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

@extends('layouts.site.index')
@section('title','Electro')
@section('content')


    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- ASIDE -->
                <div id="aside" class="col-md-3">
                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Categories</h3>
                        <div class="checkbox-filter">

                            @if(!empty($categories))
                                @foreach($categories as $cate)
                            <div class="input-checkbox">
                                <input type="checkbox" value="{{$cate->id}}" id="category-{{$cate->id}}">
                                <label for="category-{{$cate->id}}">
                                    <span></span>
                                    {{$cate->cate_name_en}}
                                    <small>({{$cate->products->count()}})</small>
                                </label>
                            </div>
                                @endforeach
                           @endif


                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Price</h3>
                        <div class="price-filter">
                            <div id="price-slider"></div>
                            <div class="input-number price-min">
                                <input id="price-min" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                            <span>-</span>
                            <div class="input-number price-max">
                                <input id="price-max" type="number">
                                <span class="qty-up">+</span>
                                <span class="qty-down">-</span>
                            </div>
                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">
                        <h3 class="aside-title">Brand</h3>
                        <div class="checkbox-filter">

                            @if(!empty($products))
                                @foreach($products->unique('brand') as $product)

                            <div class="input-checkbox">
                                <input type="checkbox" id="brand-1">
                                <label for="brand-1">
                                    <span></span>
                                    {{$product->brand}}
                                    <small>({{$product->where('brand','=',$product->brand)->count()}})</small>
                                </label>
                            </div>

                                @endforeach
                             @endif



                        </div>
                    </div>
                    <!-- /aside Widget -->

                    <!-- aside Widget -->
                    <div class="aside">





                    </div>
                    <!-- /aside Widget -->
                </div>
                <!-- /ASIDE -->

                <!-- STORE -->
                <div id="store" class="col-md-9">
                    <!-- store top filter -->
                    <div class="store-filter clearfix">
                        <div class="store-sort">

                            <h2>Products</h2>

                        </div>

                    </div>
                    <!-- /store top filter -->

                    <!-- store products -->
                    <div class="row">

                        @if(!empty($products))
                            @foreach($products as $product)
                        <!-- product -->
                        <div class="col-md-4 col-xs-6 filter-data">
                            <div class="product">
                                <div class="product-img">
                                    <img src="{{asset('uploads/products/' . $product->main_image)}}" alt="">
                                    <div class="product-label">

                                        <span class="new">NEW</span>
                                    </div>
                                </div>
                                <div class="product-body">
                                    <p class="product-category">{{$product->category->cate_name_en}}</p>
                                    <h3 class="product-name"><a href="{{route('site.product.show',$product->id)}}">{{$product->name_en}}</a></h3>
                                    <h4 class="product-price">{{$product->price}} <del class="product-old-price">$990.00</del></h4>

{{--                                    <div class="product-rating">--}}
{{--                                        @foreach($product->reviews as $review)--}}
{{--                                        @if($review->stars == 1)--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                        @elseif($review->stars == 2)--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                        @elseif($review->stars == 3)--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                        @elseif($review->stars == 4)--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star-o empty"></i>--}}
{{--                                        @elseif($review->stars == 5)--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                            <i class="fa fa-star"></i>--}}
{{--                                        @endif--}}
{{--                                        @endforeach--}}

{{--                                    </div>--}}

                                    <div class="product-btns">
                                        <a  href="{{route('site.addToCart',$product->id)}}" class="btn add-to-cart-btn"><i class="fa fa-shopping-cart"></i> {{__("lang.add-to-cart")}}</a>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <!-- /product -->
                            @endforeach
                        @endif


                    </div>
                    <!-- /store products -->

                    <!-- store bottom filter -->
                    <div class="store-filter clearfix">
                        <span class="store-qty">Showing all products</span>
                         {{$products->links()}}
                    </div>
                    <!-- /store bottom filter -->

                </div>
                <!-- /STORE -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->





@section('site-scripts')

    <script type="text/javascript">

        $(".checkbox-filter").change(function(){
            var selected_ids=[];
            var checked_ids = document.querySelectorAll("input[type=checkbox]:checked");

            for (var i=0; i< checked_ids.length; i++) {
                selected_ids.push(checked_ids[i].value);
            }



            $.ajax({
                url: '{{ url('Home/filter-by-category') }}',
                method: "post",
                dataType: "json",
                data: { _token: '{{ csrf_token() }}' ,selected_ids },
                success: function (respone) {
                    console.log(respone);
                }
            });

        });




    </script>



@endsection











@endsection

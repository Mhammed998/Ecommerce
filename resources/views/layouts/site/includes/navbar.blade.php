<!-- NAVIGATION -->
<nav id="navigation">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->
        <div id="responsive-nav">
            <!-- NAV -->
            <ul class="main-nav nav navbar-nav">
                <li class="active"><a href="#">{{__("lang.home")}}</a></li>
                <li><a href="{{route('site.main')}}">{{__("lang.categories")}}</a></li>

                @if(\App\Category::all()->count() > 0)
                    @foreach(\App\Category::select('categories.*','cate_name_'.app()->getLocale() . ' as category_name')->get() as $cate)
                    <li><a href="{{route('users.category.show',$cate->id)}}">{{$cate->category_name}}</a></li>
                    @endforeach
                    @else
                      No categories yet
                @endif


            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->

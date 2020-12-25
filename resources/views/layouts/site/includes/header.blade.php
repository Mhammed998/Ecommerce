<!-- HEADER -->
<header>
    <!-- TOP HEADER -->
    <div id="top-header">
        <div class="container">
            <ul class="header-links pull-left">
                <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
            </ul>
            <ul class="header-links pull-right">

                <li><a href="#"><i class="fa fa-flag"></i> Arabic</a></li>
                <li><a href="#"><i class="fa fa-flag"></i> English</a></li>


{{--                <li><a href="#"><i class="fa fa-user-o"></i> My Account</a></li>--}}
                <!-- Authentication Links -->
                @guest
                    <li>
                        <a  href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li>
                            <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class=" dropdown">
                        <a id="Dropdown" class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fa fa-user"></i>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="Dropdown">
                            <a style="color:#555;display: block;padding-left:7px;" class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
    <!-- /TOP HEADER -->

    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">
                        <a href="{{route('site.home')}}" class="logo">
                            <img src="{{asset('frontend/img/logo.png')}}" alt="Logo">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-7">
                    <div class="header-search">
                        <form>
                            <select class="input-select">
                                <option value="0">{{__("lang.categories")}}</option>
                                @foreach(\App\Category::select('categories.*','cate_name_'.app()->getLocale() . ' as category_name')->get() as $cate)
                                <option value="{{$cate->id}}">{{$cate->category_name}}</option>
                                @endforeach
                            </select>
                            <input style="width: calc(100% - 265px);" class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>
                    </div>
                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-2 ">
                    <div class="header-ctn">


                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" href="{{route('site.show-cart')}}"  >
                                <i class="fa fa-shopping-cart"></i>
                                <span>{{__("lang.orders")}}</span>
                                <div class="qty">
                                   {{ count(Session::get('cart', array())) }}
                                </div>
                            </a>


                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->
                    </div>
                </div>
                <!-- /ACCOUNT -->
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->

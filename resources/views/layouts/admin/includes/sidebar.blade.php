<div class="sidebar" data-color="purple" data-background-color="black" data-image="{{asset('backend/img/sidebar-2.jpg')}}">
    <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

    Tip 2: you can also add an image using data-image tag
-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
           Admin Panel
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active  ">
                <a class="nav-link" href="{{route('admin.home')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.users')}}">
                    <i class="material-icons">group</i>
                    <p>Users</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.categories')}}">
                    <i class="material-icons">library_books</i>
                    <p>Categories</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.products')}}">
                    <i class="material-icons">shopping_cart</i>
                    <p>Products</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.reviews')}}">
                    <i class="material-icons">star_rate</i>
                    <p>Reviews</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="{{route('admin.orders')}}">
                    <i class="material-icons">work</i>
                    <p>Orders</p>
                </a>
            </li>

            <li class="nav-item ">
                <a class="nav-link" href="">
                    <i class="material-icons">person</i>
                    <p>Edit Profile</p>
                </a>
            </li>
            <!-- your sidebar here -->
        </ul>
    </div>
</div>

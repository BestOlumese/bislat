<!-- Page Sidebar Start-->
<div class="page-sidebar">
    <div class="sidebar custom-scrollbar">
        <div class="sidebar-user text-center">
            <div>
                @if (!empty(auth()->user()->profile->featured))
                    <img class="img-60 rounded-circle lazyloaded blur-up" src="{{ asset(auth()->user()->profile->featured) }}" alt="#">
                @endif
            </div>
            <h6 class="mt-3 f-14">{{ auth()->user()->name }}</h6>
            <p>
                @if (auth()->user()->admin == 1)
                    Admin
                @else
                    Vendor
                @endif
            </p>
        </div>
        <ul class="sidebar-menu">
            <li><a class="sidebar-header" href="{{ route('home') }}"><i data-feather="home"></i><span>Dashboard</span></a></li>
            <li><a class="sidebar-header" href="#"><i data-feather="box"></i> <span>Products</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('category') }}"><i class="fa fa-circle"></i>Category</a></li>
                    <li><a href="{{ route('subcategory') }}"><i class="fa fa-circle"></i>Sub Category</a></li>
                    <li><a href="{{ route('product.create') }}"><i class="fa fa-circle"></i>Add Product</a></li>
                    <li><a href="{{ route('product') }}"><i class="fa fa-circle"></i>View Products</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href=""><i data-feather="settings" ></i><span>Settings</span><i class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li><a href="{{ route('profile') }}"><i class="fa fa-circle"></i>Profile</a></li>
                </ul>
            </li>
            <li><a class="sidebar-header" href="/users/logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i data-feather="log-in"></i><span>Logout</span></a>
                <form id="logout-form" action="/users/logout" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->
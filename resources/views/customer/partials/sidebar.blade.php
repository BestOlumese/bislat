<div class="col-lg-3">
    <div class="account-sidebar"><a class="popup-btn">my account</a></div>
    <div class="dashboard-left">
        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
        <div class="block-content ">
            <ul>
                <li class="active"><a href="{{ route('customer.dashboard') }}">Account Info</a></li>
                <li><a href="#">Address Book</a></li>
                <li><a href="#">My Orders</a></li>
                <li><a href="{{ route('wishlist') }}">My Wishlist</a></li>
                <li><a href="#">Newsletter</a></li>
                <li><a href="#">My Account</a></li>
                <li><a href="#">Change Password</a></li>
                <li class="last"><a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </div>
    </div>
</div>
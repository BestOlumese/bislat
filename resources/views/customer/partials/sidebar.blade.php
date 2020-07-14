<div class="col-lg-3">
    <div class="account-sidebar"><a class="popup-btn">my account</a></div>
    <div class="dashboard-left">
        <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i> back</span></div>
        <div class="block-content ">
            <ul>
                <li class="{{ $d }}"><a href="{{ route('customer.dashboard') }}">Account Info</a></li>
                <li class="{{ $ab }}"><a href="{{ route('customer.addressbook') }}">Address Book</a></li>
                <li class="{{ $or }}"><a href="{{ route('customer.orders') }}">My Orders</a></li>
                <li><a href="{{ route('wishlist') }}">My Wishlist</a></li>
                <li class="{{ $ma }}"><a href="{{ route('customer.myaccount') }}">My Account</a></li>
                <li class="{{ $cp }}"><a href="{{ route('customer.changepassword') }}">Change Password</a></li>
                <li class="last"><a href="{{ route('customer.logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log Out</a></li>
                <form id="logout-form" action="{{ route('customer.logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </ul>
        </div>
    </div>
</div>
<?php
namespace App\Http\Controllers;
use Session;
use Wishlist;
use Auth;
use App\Product;
use Illuminate\Http\Request;

class WishListController extends Controller
{
    public function add_to_wishlist(Request $request)
     {
    //     $pdt = Product::find($request->pdt_id);

    //     if ($pdt->label == 'gift') {
    //         $pdt->price = $pdt->discount_price;
    //     } else {
    //         $pdt->price = $pdt->price;
    //     }

        Wishlist::add($request->pdt_id, $request->user_id);

        return redirect()->route('wishlist');
    }

    public function wishlist()
    {
        if (!Auth::guard('customer')->check()) {
            Session::flash('info', 'Please Login to access wishlist');
            return redirect()->route('index');
        }

        $auth = Auth::guard('customer')->user()->id;

        return view('wishlist')
            ->with('products', Product::all())
            ->with('wishlists', Wishlist::getUserWishlist($auth));
    }

    public function wishlist_delete($productid, $userid)
    {
        Wishlist::removeByProduct($productid, $userid);

        return redirect()->back();
    }

    public function wishlist_delete_all($userid)
    {
        Wishlist::removeUserWishlist($userid);

        return redirect()->route('wishlist');
    }
}

<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Cart;
use App\Product;
use App\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontEndController extends Controller
{
    public function index()
    {
        return view('index')
                ->with('limitcats', Subcategory::take(5)->inRandomOrder()->get()) 
                ->with('products', Product::all())
                ->with('randproducts', Product::take(5)->inRandomOrder()->get())
                ->with('specials', Product::latest()->take(5)->get());
    }

    public function about()
    {
        return view('about');
    }

    public function contact()
    {
        return view('contact');
    }

    public function contact_store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|string|email',
            'message' => 'required|max:255',
        ]);

        Mail::to($request['email'])->send(new ContactFormMail($request->all()));

        return redirect()->back();
    }

    public function subcategory($slug)
    {
        $category = Subcategory::where('slug', $slug)->firstOrfail();
        $products = $category->product()->paginate(12);

        return view('category')
                ->with('category', $category)
                ->with('products', $products);
    }

    public function product($slug)
    {
        $product = Product::where('slug', $slug)->firstOrfail();

        return view('singleproduct')
                ->with('product', $product)
                ->with('products', Product::take(5)->inRandomOrder()->get());
    }
}

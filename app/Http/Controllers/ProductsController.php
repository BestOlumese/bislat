<?php

namespace App\Http\Controllers;

use App\Product;
use Session;
use Auth;
use App\Subcategory;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.product.index')
                    ->with('products', Product::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subcategory = Subcategory::count();

        if ($subcategory == 0) {
            Session::flash('info', 'Please create subcategory first.');

            return redirect()->route('subcategory');
        }

        return view('admin.product.create')
                    ->with('subcategories', Subcategory::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'image1' => 'image',
        ]);

        $product = new Product;

        if($request->hasFile('image1'))
        {
            $image1 = $request->image1;

            $image1_new_name = time() . $image1->getClientOriginalName();

            $image1->move('uploads/product', $image1_new_name);

            $product->image1 = 'uploads/product/'.$image1_new_name;
        }

        // if($request->hasFile('image2'))
        // {
        //     $image2 = $request->image2;

        //     $image2_new_name = time() . $image2->getClientOriginalName();

        //     $image2->move('uploads/product', $image2_new_name);

        //     $product->image2 = 'uploads/product/'.$image2_new_name;
        // }

        // if($request->hasFile('image3'))
        // {
        //     $image3 = $request->image3;

        //     $image3_new_name = time() . $image3->getClientOriginalName();

        //     $image3->move('uploads/product', $image3_new_name);

        //     $product->image3 = 'uploads/product/'.$image3_new_name;
        // }

        $product->title = $request->title;

        $product->slug = str_slug($request->title);

        $product->price = $request->price;

        if (!empty($request->price_discount)) {
            $product->price_discount = $request->price_discount;
        }

        $product->details = $request->details;

        $product->subcategory_id = $request->subcategory_id;

        $product->total_products = $request->total_products;

        if (!empty($request->label)) {
            $product->label = $request->label;
        }

        $product->keyword = $request->keyword;

        if (Auth::user()->admin == 1) {
            $product->is_published = true;
        } else {
            $product->is_published = false;
        }

        $product->save();

        Session::flash('success', 'Product created succesfully.');

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);

        return view('admin.product.edit')
                    ->with('product', $product)
                    ->with('subcategories', Subcategory::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $this->validate($request, [
            'image1' => 'image',
        ]);

        if($request->hasFile('image1'))
        {
            $image1 = $request->image1;

            $image1_new_name = time() . $image1->getClientOriginalName();

            $image1->move('uploads/product', $image1_new_name);

            $product->image1 = 'uploads/product/'.$image1_new_name;
        }

        // if($request->hasFile('image2'))
        // {
        //     $image2 = $request->image2;

        //     $image2_new_name = time() . $image2->getClientOriginalName();

        //     $image2->move('uploads/product', $image2_new_name);

        //     $product->image2 = 'uploads/product/'.$image2_new_name;
        // }

        // if($request->hasFile('image3'))
        // {
        //     $image3 = $request->image3;

        //     $image3_new_name = time() . $image3->getClientOriginalName();

        //     $image3->move('uploads/product', $image3_new_name);

        //     $product->image3 = 'uploads/product/'.$image3_new_name;
        // }

        $product->title = $request->title;

        $product->slug = str_slug($request->title);

        $product->price = $request->price;

        if (!empty($request->price_discount)) {
            $product->price_discount = $request->price_discount;
        } else {
            $product->price_discount = null;
        }

        $product->details = $request->details;

        $product->subcategory_id = $request->subcategory_id;

        $product->total_products = $request->total_products;

        if (!empty($request->label)) {
            $product->label = $request->label;
        } else {
            $product->label = null;
        }

        $product->keyword = $request->keyword;

        $product->save();

        Session::flash('success', 'Product updated succesfully.');

        return redirect()->route('product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        $product->delete();

        Session::flash('success', 'You successfully deleted the product');

        return redirect()->route('product');
    }

    public function publish($id)
    {
        $product = Product::find($id);

        $product->is_published = true;

        $product->save();

        Session::flash('success', 'You successfully published this product');

        return redirect()->route('product');
    }

    public function unpublish($id)
    {
        $product = Product::find($id);

        $product->is_published = false;

        $product->save();

        Session::flash('success', 'You successfully unpublished this product');

        return redirect()->route('product');
    }
}

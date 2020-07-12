<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Category;
use App\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin == 1) {
            $category = Category::count();

            if ($category == 0) {
                Session::flash('info', 'Please create category first.');

                return redirect()->route('category');
            }

            return view('admin.subcategory.index')
                        ->with('subcategories', Subcategory::all())
                        ->with('categories', Category::all());
        } else {
            Session::flash('info', 'You cannot perform this action');
            return redirect()->back();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = Category::count();

        if ($category == 0) {
            Session::flash('info', 'Sorry you cannot create a sub category yet. Please create a category');
        }

        $this->validate($request, [
            'name' => 'required'
        ]);

        Subcategory::create([
            'name' => $request->name,
            'slug' => str_slug($request->name),
            'category_id' => $request->category_id
        ]);

        Session::flash('success', 'Sub Category created succesfully.');

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
        if (Auth::user()->admin == 1) {
            $subcategory = Subcategory::find($id);

            return view('admin.subcategory.edit')
                        ->with('subcategory', $subcategory)
                        ->with('categories', Category::all());
        } else {
            Session::flash('info', 'You cannot perform this action');
            return redirect()->back();
        }
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
        $this->validate($request, [
            'name' => 'required'
        ]);

        $subcategory = Subcategory::find($id);

        $subcategory->name = $request->name;

        $subcategory->slug = str_slug($request->name);

        $subcategory->category_id = $request->category_id;

        $subcategory->save();

        Session::flash('success', 'Sub Category updated succesfully.');

        return redirect()->route('subcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::user()->admin == 1) {
            $subcategory = Subcategory::find($id);

            $subcategory->delete();

            Session::flash('success', 'You successfully deleted the sub category');

            return redirect()->route('subcategory');
        } else {
            Session::flash('info', 'You cannot perform this action');
            return redirect()->back();
        }
    }
}

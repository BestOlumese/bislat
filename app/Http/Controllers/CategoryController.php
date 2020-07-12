<?php

namespace App\Http\Controllers;

use Session;
use App\Category;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Session\Session as SessionSession;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->admin == 1) {
            return view('admin.category.index')
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
        $this->validate($request, [
            'name' => 'required',
            'featured' => 'required|image',
            'content' => 'required'
        ]);

        $featured = $request->featured;

        $featured_new_name = time().$featured->getClientOriginalName();

        $featured->move('uploads/category', $featured_new_name);

        Category::create([
            'name' => $request->name,
            'featured' => 'uploads/category/' . $featured_new_name,
            'content' => $request->content
        ]);

        Session::flash('success', 'Category created succesfully.');

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
        $category = Category::find($id);

        if (Auth::user()->admin == 1) {
            return view('admin.category.edit')->with('category', $category);
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
            'name' => 'required',
            'content' => 'required'
        ]);

        $category = Category::find($id);

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/category', $featured_new_name);

            $category->featured = 'uploads/category/'.$featured_new_name;
        }

        $category->name = $request->name;

        $category->content = $request->content;

        $category->save();

        Session::flash('success', 'Category updated succesfully.');

        return redirect()->route('category');
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
            $category = Category::find($id);

            $category->delete();

            Session::flash('success', 'You successfully deleted the category');

            return redirect()->route('category');
        } else {
            Session::flash('info', 'You cannot perform this action');
            return redirect()->back();
        }
    }
}

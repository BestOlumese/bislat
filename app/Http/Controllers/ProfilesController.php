<?php

namespace App\Http\Controllers;

use Session;
use App\Profile;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ProfilesController extends Controller
{
    public function profile()
    {
        return view('admin.settings.profile');
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $user->name = $request->name;

        $user->save();

        if (Profile::where('user_id', auth()->user()->id)->firstOrfail()) {
            $profile = Profile::where('user_id', auth()->user()->id)->firstOrfail();
        } else {
            $profile = new Profile;
        }
        
        //uploads/profile/159410052843.jpg

        if($request->hasFile('featured'))
        {
            $featured = $request->featured;

            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('uploads/profile', $featured_new_name);

            $profile->featured = 'uploads/profile/'.$featured_new_name;
        }

        $profile->user_id = Auth::id();

        $profile->facebook = $request->facebook;

        $profile->twitter = $request->twitter;

        $profile->linkedin = $request->linkedin;

        $profile->gender = $request->gender;

        $profile->save();

        Session::flash('success', 'Profile updated succesfully.');

        return redirect()->back();
    }
}

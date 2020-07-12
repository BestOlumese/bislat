<?php

namespace App\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\SocialAccountService;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback(SocialAccountService $service)
    {
        $customer = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->guard('customer')->login($customer);
        return redirect()->route('customer.dashboard');
    }
}

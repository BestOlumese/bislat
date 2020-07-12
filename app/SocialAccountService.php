<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Laravel\Socialite\Contracts\User as ProviderUser;

class SocialAccountService extends Model
{
    public function createOrGetUser(ProviderUser $providerUser)
    {
        $account = SocialAccount::whereProvider('facebook')
            ->whereProviderUserId($providerUser->getId())
            ->first();
        
        if ($account) {
            return $account->customer;
        } else {
            $account = new SocialAccount([
                'provider_user_id' => $providerUser->getId(),
                'provider' => 'facebook'
            ]);

            $customer = Customer::whereEmail($providerUser->getEmail())->first();

            if (!$customer) {

                $customer = Customer::create([
                    'email' => $providerUser->getEmail(),
                    'name' => $providerUser->getName(),
                    'pnumber' => '08012345678',
                ]);
            }

            $account->customer()->associate($customer);
            $account->save();

            return $customer;
        }
    }
}

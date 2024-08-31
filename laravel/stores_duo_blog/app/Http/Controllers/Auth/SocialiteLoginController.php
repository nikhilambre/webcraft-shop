<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\Customer;
use Carbon\Carbon;
use Auth;

class SocialiteLoginController extends Controller
{
    private function registerCustomer($user)
    {
        $findUser = Customer::where('email', $user->email)->first();

        if ($findUser){
            Auth::guard('customer')->login($findUser);
            return $findUser;

        } else{

            $customer = new Customer();
            $customer->name = $user->name;
            $customer->email = $user->email;
            $customer->lastname = $user->name;
            $customer->verified = 1;
            $customer->created_at = Carbon::now();
            $customer->password = bcrypt(str_random(30));

            $customer->save();
            Auth::guard('customer')->login($customer);

            return $customer;
        }
    }

    public function redirectToProviderFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleProviderCallbackFacebook()
    {
        try
        {
            $user = Socialite::driver('facebook')->user();
        }
        catch(Exception $exception)
        {
            return redirect()->route('blog.index');
        }

        $customer = $this->registerCustomer($user);

        return redirect()->route('blog.index');
    }


    public function redirectToProviderTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    public function handleProviderCallbackTwitter()
    {
        try
        {
            $user = Socialite::driver('twitter')->user();
        }
        catch(Exception $exception)
        {
            return redirect()->route('blog.index');
        }

        $customer = $this->registerCustomer($user);

        return redirect()->route('blog.index');
    }


    public function redirectToProviderGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallbackGoogle()
    {
        try
        {
            $user = Socialite::driver('google')->user();
        }
        catch(Exception $exception)
        {
            return redirect()->route('blog.index');
        }

        $customer = $this->registerCustomer($user);

        return redirect()->route('blog.index');
    }
}

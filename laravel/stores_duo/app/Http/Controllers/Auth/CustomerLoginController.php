<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout'] ]);
    }

    public function showLoginform()
    {
        return view('auth.customer-login');
    }

    public function credentials(Request $request)
    {
        return [
            'email' => $request->email,
            'password' => $request->password,
            'verified' => 1,
        ];
    }

    public function login(Request $request)
    {
        // validate the form data
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6|max:20'
        ]);

        //  attempt to log in ther user
        if (Auth::guard('customer')->attempt($this->credentials($request), $request->has('remember')) ) {
            //If they are successful
            return redirect()->intended(route('guest.index'));
        }

        //  If unsuccesfull
        $errors = ['email' => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()->withInput($request->only('email', 'remember'))->withErrors($errors);
    }

    public function logout() 
    {
        Auth::guard('customer')->logout();
        return redirect('/');
    }
}

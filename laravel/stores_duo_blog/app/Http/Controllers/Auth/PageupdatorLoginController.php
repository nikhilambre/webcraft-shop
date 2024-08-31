<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class PageupdatorLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:pageupdator', ['except' => ['logout'] ]);
    }

    public function showLoginform()
    {
        return view('auth.pageupdator-login');
    }

    public function credentials(Request $request)
    {
        return [
            'username' => $request->username,
            'password' => $request->password
        ];
    }

    public function login(Request $request)
    {
        // validate the form data
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required'
        ]);

        //  attempt to log in ther user
        if (Auth::guard('pageupdator')->attempt($this->credentials($request), $request->has('remember')) ) {
            //If they are successful
            return redirect()->intended(route('blog.index'));
        }

        //  If unsuccesfull
        $errors = ['username' => trans('auth.failed')];

        if ($request->expectsJson()) {
            return response()->json($errors, 422);
        }

        return redirect()->back()->withInput($request->only('username', 'remember'))->withErrors($errors);
    }

    public function logout() 
    {
        Auth::guard('pageupdator')->logout();
        return redirect('/');
    }
}

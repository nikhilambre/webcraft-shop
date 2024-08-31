<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Seo;
use App\Blogcategor;

class CustomerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:customer', ['except' => ['logout'] ]);
    }

    public function showLoginform()
    {
        $pageName = 'login';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        return view('blog.login')->with([
            'seo' => $seo,
            'category' => $category,
        ]);
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
            return redirect()->intended(route('blog.index'));
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

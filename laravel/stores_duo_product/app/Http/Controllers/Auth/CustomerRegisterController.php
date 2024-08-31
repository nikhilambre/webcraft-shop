<?php

namespace App\Http\Controllers\Auth;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use DB;
use Mail;
use Carbon\Carbon;
use Session;
use Illuminate\Http\Request;
use App\Mail\CustomerEmailVerification;

use App\Seo;
use App\Blogcategor;

class CustomerRegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Customer Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:customer');
    }

    public function showRegistrationForm()
    {
        $pageName = 'register';
        $seo = Seo::GetForPagename($pageName)->get();

        $category = Blogcategor::select('id','categoryName','categoryNameSlug','created_at')
                            ->where('categoryStatus', 'ACTIVE')
                            ->orderBy('categoryRank')
                            ->get();

        return view('blog.register')->with([
            'seo' => $seo,
            'category' => $category,
        ]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:40',
            'lastname' => 'required|max:60',
            'email' => 'required|email|max:100|unique:customers',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new customer instance after a valid registration.
     *
     * @param  array  $data
     * @return Customer
     */
    protected function create(array $data)
    {
        return Customer::create([
            'name' => $data['name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => str_random(20),
            'customerImgName' => 'user-default-img.jpg',
        ]);
    }


    /**
    *  Over-ridden the register method from the "RegistersUsers" trait
    *  Remember to take care while upgrading laravel
    */
    public function register(Request $request)
    {
        // Laravel validation
        $validator = $this->validator($request->all());
        if ($validator->fails()) 
        {
            $this->throwValidationException($request, $validator);
        }

        // Using database transactions is useful here because stuff happening is actually a transaction
        // I don't know what I said in the last line! Weird!
        DB::beginTransaction();

        try
        {
            $user = $this->create($request->all());
            // After creating the user send an email with the random token generated in the create method above
            $email = new CustomerEmailVerification(new Customer(['email_token' => $user->email_token, 'name' => $user->name]));
            Mail::to($user->email)->send($email);
            DB::commit();
        }
        catch(Exception $e)
        {
            DB::rollback(); 
            return back();
        }

        //  If try is successfull then fetch ip of user to save.

        //  Get id of saved user
        $email = $request->input('email');        
        $customer = Customer::where('email', $email)->get()->first()->toArray();
        $id = $customer['id'];

        $currentIp = geoip()->getLocation()->toArray();
        $affiliateId = $request->cookie('id_a');
    
        $ip = $currentIp['ip'];
        $city = $currentIp['city'];
        $state = $currentIp['state'];
        $state_name = $currentIp['state_name'];
        $country = $currentIp['country'];
        $currency = $currentIp['currency'];
        $iso_code = $currentIp['iso_code'];
        $created_at = Carbon::now();
        
        DB::table('customerlocations')->insert([
            'customerId' => $id,
            'affiliateId' => $affiliateId,
            'ip' => $ip,
            'city' => $city,
            'state' => $state,
            'state_name' => $state_name,
            'country' => $country, 
            'currency' => $currency,
            'iso_code' => $iso_code,
            'created_at' => $created_at]
        );
        
        Session::flash('message', 'You Have Successfully Registered..! Check your Inbox for Verification Email.');
        return redirect()->route('blog.index');
    }

    public function verify($token)
    {
        // The verified method has been added to the customer model and chained here
        // for better readability
        try {
            Customer::where('email_token',$token)->firstOrFail()->verified();

        } catch(\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            
            //return Response::make('Not found',404);
            //or
            return view('errors.404');
        }

        Session::flash('message', 'Your Email Id is Successfully Verified..!');
        return redirect()->route('blog.index');
    }
}

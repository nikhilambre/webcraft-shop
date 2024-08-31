<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Customeraddr;
use App\Customer;
use Auth;

class UserProfileController extends Controller
{
    public function getProfile()
    {
        $customerId = Auth::guard('customer')->id();

        $customer = Customer::select('id','name','lastname','email','created_at')
                        ->where('id', $customerId)
                        ->get();
        
        $customeraddr = Customeraddr::select('id','addrType','customerId','addrText','addrCity','addrState',
                                            'addrCountry','addrPincode','addrChat','addrContactNo','created_at')
                        ->where('customerId', $customerId)
                        ->get();

        return view('user.user-profile')->with([
            'customeraddr' => $customeraddr,
            'customer' => $customer
        ]);
    }

    public function getProfileComponents()
    {
        
    }

    public function getAddress()
    {
        return view('user.user-address-create');
    }

    public function postAddress(Request $request)
    {
        $this->validate($request, [
            'addrCity' => 'required|max:30',
            'addrState' => 'required|max:30',
            'addrCountry' => 'required|max:40',
            'addrText' => 'required|max:200',
            'addrPincode' => 'required|max:15'
        ]);

        $customerId = Auth::guard('customer')->id();

        $customeraddr = new Customeraddr();

        $customeraddr->customerId = $customerId;
        $customeraddr->addrText = $request->input('addrText');
        $customeraddr->addrCity = $request->input('addrCity');
        $customeraddr->addrState = $request->input('addrState');
        $customeraddr->addrCountry = $request->input('addrCountry');
        $customeraddr->addrPincode = $request->input('addrPincode');
        $customeraddr->addrChat = $request->input('addrChat');
        $customeraddr->addrContactNo = $request->input('addrContactNo');
        $customeraddr->save();

        return redirect()->route('get.user-profile');
    }

    public function getAddressEdit()
    {
        $customerId = Auth::guard('customer')->id();
        
        $customeraddr = Customeraddr::select('id','addrType','customerId','addrText','addrCity','addrState',
                                            'addrCountry','addrPincode','addrChat','addrContactNo','created_at')
                        ->where('customerId', $customerId)
                        ->get();

        return view('user.user-address-edit')->with([
            'customeraddr' => $customeraddr
        ]);
    }

    public function postAddressEdit(Request $request, $id)
    {
        $customerId = Auth::guard('customer')->id();
        $customeraddr = Customeraddr::find($id);
        
        if(!$customeraddr) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        $customeraddr->customerId = $customerId;
        $customeraddr->addrText = $request->input('addrText');
        $customeraddr->addrCity = $request->input('addrCity');
        $customeraddr->addrState = $request->input('addrState');
        $customeraddr->addrCountry = $request->input('addrCountry');
        $customeraddr->addrPincode = $request->input('addrPincode');
        $customeraddr->addrChat = $request->input('addrChat');
        $customeraddr->addrContactNo = $request->input('addrContactNo');
        $customeraddr->save();

        return redirect()->route('get.user-profile');
    }

    public function addressDelete($id)
    {
        $customeraddr = Customeraddr::find($id);
        $customeraddr->delete();

        return redirect()->route('get.user-profile');
    }
}

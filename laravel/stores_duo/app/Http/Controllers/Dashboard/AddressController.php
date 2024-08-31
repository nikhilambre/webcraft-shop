<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Cache;
use App\Addr;

class AddressController extends Controller
{
    public function postAddr(Request $request)
    {
        $this->validate($request, [
            'addressHead' => 'required|max:40',
            'addressBody' => 'required|max:400',
            'addressNumber' => 'required',
            'addressName' => 'required|max:60',
            'addressEmail' => 'required|max:100|email',
            'addressLine1' => 'max:191',
            'addressLine2' => 'max:191',
            'addressLine3' => 'max:191',
            'addressLine4' => 'max:191'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $addr = new Addr();

        $addr->addressHead = $request->input('addressHead');
        $addr->addressBody = $request->input('addressBody');
        $addr->addressNumber = $request->input('addressNumber');
        $addr->addressName = $request->input('addressName');
        $addr->addressEmail = $request->input('addressEmail');
        $addr->addressLine1 = $request->input('addressLine1');
        $addr->addressLine2 = $request->input('addressLine2');
        $addr->addressLine3 = $request->input('addressLine3');
        $addr->addressLine4 = $request->input('addressLine4');
        
        $addr->save();
        return response()->json(['address' => $addr], 201);
    }

    public function getAddrs()
    {
        $addr = Addr::select('id','addressHead','addressBody','addressNumber','addressName','addressEmail','addressLine1','addressLine2','addressLine3','addressLine4','created_at')->get();

        $response = [
            'data' => $addr
        ];
        return response()->json($response, 200);
    }

    public function getAddr($id)
    {
        $addr = Addr::select('id','addressHead','addressBody','addressNumber','addressName','addressEmail','addressLine1','addressLine2','addressLine3','addressLine4','created_at')
                        ->where('id', $id)
                        ->get();

        $response = [
            'data' => $addr
        ];
        return response()->json($response, 200);
    }

    public function putAddr(Request $request, $id)
    {
        $addr = Addr::find($id);

        if(!$addr) {
            return response()->json(['message' => 'Address not found'], 404);
        }

        $this->validate($request, [
            'addressHead' => 'required|max:40',
            'addressBody' => 'required|max:400',
            'addressNumber' => 'required|numeric',
            'addressName' => 'required|max:60',
            'addressEmail' => 'required|max:100',
            'addressLine1' => 'max:80',
            'addressLine2' => 'max:80',
            'addressLine3' => 'max:80',
            'addressLine4' => 'max:80'
        ]);

        $addr->addressHead = $request->input('addressHead');
        $addr->addressBody = $request->input('addressBody');
        $addr->addressNumber = $request->input('addressNumber');
        $addr->addressName = $request->input('addressName');
        $addr->addressEmail = $request->input('addressEmail');
        $addr->addressLine1 = $request->input('addressLine1');
        $addr->addressLine2 = $request->input('addressLine2');
        $addr->addressLine3 = $request->input('addressLine3');
        $addr->addressLine4 = $request->input('addressLine4');
        $addr->update();

        return response()->json(['address' => $addr], 200);
    }

    public function deleteAddr($id)
    {
        $addr = Addr::find($id);
        $addr->delete();
        return response()->json(['message' => 'Address deleted Successfully.', 200]);
    }
}

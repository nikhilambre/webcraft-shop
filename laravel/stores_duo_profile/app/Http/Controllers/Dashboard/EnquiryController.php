<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Enquir;

class EnquiryController extends Controller
{
    public function postEnquir(Request $request)
    {
        $this->validate($request, [
            'enquiryName' => 'required|max:191',
            'enquiryEmail' => 'required|email|max:100',
            'enquiryContact' => 'required|numeric',
            'enquiryText' => 'required|max:1600',
            'productId' => 'required|integer'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $enquiry = new Enquir();

        $enquiry->enquiryName = $request->input('enquiryName');
        $enquiry->enquiryEmail = $request->input('enquiryEmail');
        $enquiry->enquiryContact = $request->input('enquiryContact');
        $enquiry->productId = $request->input('productId');
        $enquiry->enquiryText = $request->input('enquiryText');

        $enquiry->save();
        return response()->json(['enquiry' => $enquiry], 201);
    }

    public function getEnquirs()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $enquiry = Enquir::select('id','enquiryName','enquiryEmail','enquiryContact','productId','enquiryText','created_at')
                            ->get();

        $response = [
            'data' => $enquiry
        ];
        return response()->json($response, 200);
    }

    public function getEnquir($id)
    {
        $enquiry = Enquir::select('id','enquiryName','enquiryEmail','enquiryContact','productId','enquiryText','created_at')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $enquiry
        ];
        return response()->json($response, 200);
    }

    public function putEnquir(Request $request, $id)
    {
        $enquiry = Enquir::find($id);

        if(!$enquiry) {
            return response()->json(['message' => 'Enquiry not found'], 404);
        }

        $this->validate($request, [
            'enquiryName' => 'required|max:191',
            'enquiryEmail' => 'required|email|max:100',
            'enquiryContact' => 'required|max:20|numeric',
            'enquiryText' => 'required|max:1600',
            'productId' => 'required|integer'
        ]);

        $enquiry->enquiryName = $request->input('enquiryName');
        $enquiry->enquiryEmail = $request->input('enquiryEmail');
        $enquiry->enquiryContact = $request->input('enquiryContact');
        $enquiry->productId = $request->input('productId');
        $enquiry->enquiryText = $request->input('enquiryText');

        $enquiry->update();

        return response()->json(['enquiry' => $enquiry], 200);
    }

    public function deleteEnquir($id)
    {
        $enquiry = Enquir::find($id);
        $enquiry->delete();
        return response()->json(['message' => 'Enquiry deleted Successfully.', 200]);
    }
}

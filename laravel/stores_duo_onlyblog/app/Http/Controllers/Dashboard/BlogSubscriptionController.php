<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Blogsubscription;

class BlogSubscriptionController extends Controller
{
    public function postBlogSubscription(Request $request)
    {
        $this->validate($request, [
            'customerId' => 'required',
            'name' => 'required',
            'email' => 'required|unique:blogsubscriptions,email',
        ]);

        $blogsubscription = Blogsubscription::updateOrCreate(
            ['email' => $request->input('email')],
            ['customerId' => $request->input('customerId'), 'name' => $request->input('name')]
        );

        return response()->json(['blogsubscription' => $blogsubscription], 201);
    }

    public function getBlogSubscriptions()
    {
        //  $blogsubscriptions = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $blogsubscriptions = Blogsubscription::select('id','customerId','name','email','created_at')
                            ->get();

        $response = [
            'data' => $blogsubscriptions
        ];
        return response()->json($response, 200);
    }

    public function getBlogSubscription($id)
    {
        $blogsubscriptions = Blogsubscription::select('id','customerId','name','email','created_at')
                            ->where('id', $id)
                            ->get();

        $response = [
            'data' => $blogsubscriptions
        ];
        return response()->json($response, 200);
    }

    public function putBlogSubscription(Request $request, $id)
    {
        $blogsubscription = Blogsubscription::find($id);

        if(!$blogsubscription) {
            return response()->json(['message' => 'Subscription not found'], 404);
        }

        $this->validate($request, [
            'customerId' => 'required',
            'name' => 'required',
            'email' => 'required|unique:blogsubscriptions,email',
        ]);

        $blogsubscription->customerId = $request->input('customerId');
        $blogsubscription->name = $request->input('name');
        $blogsubscription->email = $request->input('email');

        $blogsubscription->update();

        return response()->json(['blogsubscription' => $blogsubscription], 200);
    }

    public function deleteBlogSubscription($id)
    {
        $blogsubscription = Blogsubscription::find($id);
        $blogsubscription->delete();
        return response()->json(['message' => 'Subscription Deleted Successfully.', 200]);
    }
}

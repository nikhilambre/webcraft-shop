<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Pageupdator;

class PageupdatorController extends Controller
{
    public function postPageupdator(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|unique:pageupdators,username|max:20',
            'password' => 'required|max:60|min:6'
        ]);

        $pageupdator = new Pageupdator();

        $pageupdator->username = $request->input('username');
        $pageupdator->password = bcrypt($request->input('password'));
        $pageupdator->save();
        return response()->json(['pageupdator' => $pageupdator], 201);
    }

    public function getPageupdators()
    {
        $pageupdator = Pageupdator::select('id','username','created_at')
                            ->get();

        $response = [
            'data' => $pageupdator
        ];
        return response()->json($response, 200);
    }

    // public function getForUser($id)
    // {
    //     $pageupdator = Pageupdator::select('id', 'username', 'created_at')
    //                         ->where('username', '=', $id)
    //                         ->get();

    //     $response = [
    //         'data' => $pageupdator
    //     ];
    //     return response()->json($response, 200);
    // }

    public function deletePageupdator($id)
    {
        $pageupdator = Pageupdator::find($id);
        $pageupdator->delete();
        return response()->json(['message' => 'page updator deleted Successfully.', 200]);
    }

    // public function changePassword(Request $request, $id)
    // {
    //     $pageupdator = Pageupdator::find($id);
    //     $hashedPassword = $pageupdator->password;
        
    //     if(!$pageupdator) {
    //         return response()->json(['message' => 'pageupdator not found'], 404);
    //     }

    //     $this->validate($request, [
    //         'password' => 'required',
    //         'confirmPassword' => 'required',
    //         'oldPassword' => 'required'
    //     ]);

    //     $password = $request->input('password');
    //     $confirmPassword = $request->input('confirmPassword');
    //     $oldPassword = $request->input('oldPassword');

    //     //  Password should be same as confirme password
    //     if ($confirmPassword == $password) {

    //         //  Password and New password should be different
    //         if (!($password == $oldPassword)) {

    //             //  Oldpassword should match with old password
    //             if (Hash::check($oldPassword, $hashedPassword))
    //             {
    //                 $pageupdator->password = bcrypt($password);
    //                 $pageupdator->update();
    //                 return response()->json(['pageupdator' => $pageupdator->username], 200);

    //             } else {
    //                 return response()->json(['message' => 'Current Password do not Match'], 404);
    //             }
    //         } else {
    //             return response()->json(['message' => 'New Password Must be different than Old.'], 404);
    //         }
    //     } else{
    //         return response()->json(['message' => 'Password and Confirme Password Do not Match'], 404);
    //     }

    // }
}

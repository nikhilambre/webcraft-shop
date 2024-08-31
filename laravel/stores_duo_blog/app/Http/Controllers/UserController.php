<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

use Mail;
use Hash;
use App\Mail\NewDashboardUser;

class UserController extends Controller
{
    public function postUser(Request $request)
    {
        $this->validate($request, [
            'firstname' => 'required|max:60',
            'lastname' => 'required|max:60',
            'username' => 'required|unique:users,username|max:20|min:6',
            'email' => 'required|unique:users,email|max:191'
        ]);

        /**
        * To display errors use
        *
        * echo $validator->errors()->first('email');   in your html view below your respective field.
        * It will show first error on email field, there can be many, will show one at a time
        */

        $code = uniqid();
        $user = new User();

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = bcrypt($code);
        $user->job_role = 'USER';
        $user->status = 'ACTIVE';

        $user->save();
        $user->code = $code;

        Mail::to($user->email)->send(new NewDashboardUser($user));
        return response()->json(['user' => $user->username], 201);
    }

    public function getUsers()
    {
        //  $filters = Filter::where('votes', '>', 100)->paginate(15);      // pagination with where clause
        $user = User::select('id','firstname','lastname','username','email','created_at')
                            ->where('job_role', '<>', 'ADMIN')
                            ->get();

        $response = [
            'data' => $user
        ];
        return response()->json($response, 200);
    }

    public function getUser($id)
    {
        $user = User::select('id','firstname','lastname','username','email','created_at')
                            ->where('id', '=', $id)
                            ->get();

        $response = [
            'data' => $user
        ];
        return response()->json($response, 200);
    }

    public function putUser(Request $request, $id)
    {
        $user = User::find($id);

        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $this->validate($request, [
            'firstname' => 'required|max:191',
            'lastname' => 'required|max:191',
            'username' => 'required|unique:users,username,'.$id.'|max:12|min:6',
            'email' => 'required|unique:users,email,'.$id.'|max:191'
        ]);

        $user->firstname = $request->input('firstname');
        $user->lastname = $request->input('lastname');
        $user->username = $request->input('username');
        $user->email = $request->input('email');

        $user->update();
        return response()->json(['user' => $user], 200);
    }

    public function deleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['message' => 'User deleted Successfully.', 200]);
    }

    public function getForUser($id) 
    {
        $user = User::select('id','firstname','lastname','username','email','job_role','created_at')
                    ->where('username', '=', $id)
                    ->get();

        $response = [
            'data' => $user
        ];
        return response()->json($response, 200);
    }

    public function changePassword(Request $request, $id)
    {
        $user = User::find($id);
        $hashedPassword = $user->password;
        
        if(!$user) {
            return response()->json(['message' => 'User not found'], 404);
        }

        $this->validate($request, [
            'password' => 'required',
            'confirmPassword' => 'required',
            'oldPassword' => 'required'
        ]);

        $password = $request->input('password');
        $confirmPassword = $request->input('confirmPassword');
        $oldPassword = $request->input('oldPassword');

        //  Password should be same as confirme password
        if ($confirmPassword == $password) {

            //  Password and New password should be different
            if (!($password == $oldPassword)) {

                //  Oldpassword should match with old password
                if (Hash::check($oldPassword, $hashedPassword))
                {
                    $user->password = bcrypt($password);
                    $user->update();
                    return response()->json(['user' => $user->username], 200);

                } else {
                    return response()->json(['message' => 'Current Password do not Match'], 404);
                }
            } else {
                return response()->json(['message' => 'New Password Must be different than Old.'], 404);
            }
        } else{
            return response()->json(['message' => 'Password and Confirme Password Do not Match'], 404);
        }

    }

}

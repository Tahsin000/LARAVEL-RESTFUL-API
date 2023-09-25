<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    public function showUser($id = null)
    {
        if ($id == '') {
            $users = User::get();
            return response()->json(['users' => $users], 200);
        } else {
            $users = User::find($id);
            return response()->json(['users' => $users], 200);
        }
    }
    public function addUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'name'=> 'required',
                'email'=> 'required|email|unique:users',
                'password'=> 'required',
            ];
            $customMessage = [
                'name.required'=>'name is required',
                'email.required'=>'email is required',
                'email.required'=>'email must be a valid email',
                'password.required'=>'password is required',
            ];

            $validator = Validator::make($data, $rules, $customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(), 422);
            }
            // return $data;
            $user = new User();
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = bcrypt($data['password']);
            $user->save();
            $message = "User successfully Added";
            return response()->json(['message' => $message], 201);
        }
    }
    public function addMultipleUser(Request $request)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $rules = [
                'users.*.name'=> 'required',
                'users.*.email'=> 'required|email|unique:users',
                'users.*.password'=> 'required',
            ];
            $customMessage = [
                'users.*.name.required'=>'name is required',
                'users.*.email.required'=>'email is required',
                'users.*.email.required'=>'email must be a valid email',
                'users.*.password.required'=>'password is required',
            ];

            $validator = Validator::make($data, $rules, $customMessage);
            if($validator->fails()){
                return response()->json($validator->errors(), 422);
            }
            // return $data;
            foreach($data['users'] as $addUser){
                $user = new User();
                $user->name = $addUser['name'];    
                $user->email = $addUser['email'];    
                $user->password = bcrypt($addUser['password']);
                $user->save();
                $message = 'User Successfully Added';
            }
            return response()->json(['message'=>$message], 201);
        }
    }
}

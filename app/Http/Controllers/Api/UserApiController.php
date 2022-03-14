<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    public function login(Request $request)
    {
        $inputVal = $request->all();

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(auth()->attempt(array('email' => $inputVal['email'], 'password' => $inputVal['password']))){
            if (auth()->user()->is_admin == 1) {
                $data = [
                    'user_role' => auth()->user()->is_admin,
                    'user_id' => auth()->user()->id,
                    'message' => 'User Login Successfully',
                ];
                return response()->json($data)->setStatusCode(Response::HTTP_OK);
            }else{
                $data = [
                    'user_role' => auth()->user()->is_admin,
                    'user_id' => auth()->user()->id,
                    'message' => 'User Login Successfully',
                ];
                return response()->json($data)->setStatusCode(Response::HTTP_OK);
            }
        }else{
            return response()->json(['message'=>'Email & Password are incorrect.'])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }
    }
    public function register(Request $request)
    {
        if (User::where('email',$request->email)->exists() || User::where('phone',$request->phone)->exists() ) {
            return response()->json(['message'=>'User Already Exist'])->setStatusCode(Response::HTTP_BAD_REQUEST);
        }else{
            $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'is_admin'=>'0',
            'password'=>Hash::make($request->password),
            ]);
        return response()->json([
            'user_role'=>$user->is_admin,
            'user_id'=>$user->id
            ])->setStatusCode(Response::HTTP_OK);
        }
    }
}

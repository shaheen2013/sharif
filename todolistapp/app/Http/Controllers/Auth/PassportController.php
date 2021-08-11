<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Illuminate\Support\Facades\Auth;


class PassportController extends Controller
{
    public function login(Request $req){
        $email = $req->input('email');
        $password = $req->input('password');
        if(Auth::attempt(['email' => $email, 'password' => $password])){
            $user = Auth::user();
            $token = $user->createToken('Token_')->accessToken;
            return response()->json($token);
        }else{
            return response()->json("Unknown");
        }
    }
    public function register(Request $req){
        $validator = Validator::make($req->all(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'c_password' => 'required|same:password',
        ]);
        if($validator->fails()){
            return response()->json('Validation fail');
        }
        $input = $req->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $token = $user->createToken('Token_')->accessToken;
        return response()->json($token);
    }
    public function logout()
    {
        Auth::logout();
        return redirect('login');
    }
}

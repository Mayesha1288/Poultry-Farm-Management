<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function registration(){
        return view('admin.pages.registation');
    }

    public function registrationPost(Request $request){
        // dd($request->all());
        User::create([
            'username'=>$request->username,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'contact'=>$request->contact,
        ]);
        return redirect()->route('admin.login');
    }

    public function login(){
        return view('admin.pages.login');
    }

    public function doLogin(Request $request){
        // dd($request->all());
        $userpost=$request->except('_token');
        // dd($userpost);
        // dd(Auth::attempt($userpost));
        if(Auth::attempt($userpost))
        {
            return redirect()->route('admin.dashboard');
        }
        else
        return redirect()->route('admin.login')->with('msg',' Invalid Email and Password.');

    }

    public function logout(){
        Auth::logout();
        return redirect()->back();
    }

}

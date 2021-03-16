<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showViewLogin(Request $request)
    {
    }
    public function handleLogin(Request $request)
    {
        echo $request->email . "<br>";
        echo $request->password . "<br>";
        echo $request->remember . "<br>";
        $remember = true;
        if ($request->remember == true) {
            $remember = 1;
        } else {
            $remember = 0;
        }
        echo $remember;

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $inforuser = [
                "email" => $request->email,
                "password" => $request->password,
            ];
            //echo "Login successfully";
            //return view('home', ['response' => $response]);
            return redirect()->route('uploadfilepage');
        } else {
            echo "login failse";
        }
        //return "run in handle login<br>";
        //$credentials = $request->only('email', 'password');
        //echo $credentials;
    }
    public function handleLogout()
    {
        Auth::logout();
        return redirect()->route('loginpage');
    }
}

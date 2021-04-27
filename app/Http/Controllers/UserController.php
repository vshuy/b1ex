<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showViewLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('uploadfilepage');
        } else {
            return view('login');
        }
    }
    public function handleLogin(Request $request)
    {
        if (Auth::check()) {
            return redirect()->route('uploadfilepage');
        } else {
            $remember = true;
            if ($request->remember == true) {
                $remember = true;
            } else {
                $remember = false;
            }
            echo $remember;
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $remember)) {
                $inforuser = [
                    "email" => $request->email,
                    "password" => $request->password,
                ];
                return redirect()->route('uploadfilepage');
            } else {
                echo "login failed";
            }
        }
    }
    public function handleLogout()
    {
        Auth::logout();
        return redirect()->route('loginpage');
    }
}

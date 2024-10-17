<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index()
    {

        return view('admin.login');
    }
    public function authenticate(Request $request)
    {

        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if (Auth::guard('admin')->attempt(["email" => $request->email, "password" => $request->password])) {

            if (Auth::guard('admin')->user()->role != 'admin') {

                Auth::guard('admin')->logout();
                return redirect()->route('admin.login')->with('error', "Unauthorize user. Access denied");
            }else {
                return redirect()->route('admin.dashboard')->with('success', "You are successfully logged in");
            }

        }

        return redirect()->route('admin.login')->with('error', " Invalid credentials");

    }

    public function register()
    {

        $user = new User();
        $user->name = "Admin";
        $user->email = "admin@gmail.com";
        $user->password = Hash::make('12345678');
        $user->role = "admin";
        $user->save();

        return redirect()->route('admin.login')->with("success", "Registration successfully");
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login')->with('success', "Logout successfully");
    }
    public function dashboard()
    {

        return view('admin.dashboard');
    }
    public function form()
    {

        return view('admin.form');
    }
    public function table()
    {

        return view('admin.table');
    }
}

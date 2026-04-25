<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function register(Request $request){

            $data = $request->validate([
                'admin_name' => 'required|string|max:255',
                'password' => 'required|string|min:4|confirmed',
            ]);

            $admin = Admin::create([
                'admin_name' => $data['admin_name'],
                'password' => bcrypt($data['password']),
            ]);

            if ($admin){
                return redirect()->route('login')->with('success', 'Admin registered successfully. Please login.');
            }
            return back()->with('error', 'Registration failed. Please try again.');
    }

    public function authCheck(Request $request){
        $credentials = $request->validate([
             'admin_name' => 'required|string|max:255',
            'password' => 'required|string|min:4',
        ]);

        if(Auth::attempt($credentials)){
            return redirect()->route('Dashboard')->with('success', 'Logged in successfully.');
        }
        return redirect()->route('login')->with('error', 'Invalid credentials.');
    }
}

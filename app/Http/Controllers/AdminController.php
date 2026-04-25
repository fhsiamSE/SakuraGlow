<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

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
}

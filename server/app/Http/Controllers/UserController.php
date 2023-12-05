<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function create(Request $request)
    {
        try {
            // Validation
            $request->validate([
                'email' => 'required|email|unique:user_logins',
                'password' => 'required|min:6',
                'is_active' => 'boolean',
            ]);

            // Create a new UserLogin instance
            UserLogin::create([
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'is_active' => $request->input('is_active', true),
            ]);

            return response()->json(['status' => 200, 'error' => '', 'data' => []]);
        } catch (\Exception $e) {
            return response()->json(['status' => 500, 'error' => 'Database error', 'data' => []]);
        }
    }
}

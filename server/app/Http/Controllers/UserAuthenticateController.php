<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserLogin extends Controller
{
    public function read(Request $request, $email, $password)
    {
        try {
            // Using the 'where' method to find a user with the given email and password
            $credentials = UserLogin::where([
                'email' => $email,
                'password' => bcrypt($password),
            ])->first();

            if (!$credentials) 
                return response()->json(['status' => 404, 'error' => 'Applicant not found', 'data' => null]);

            $token = UserToken::create([
                'user_id' => $user_id,
                'token' => str_random(60), // Generate a random token (adjust the length as needed)
            ]);

            $userToken = UserLogin::join('user_tokens', 'user_logins.id', '=', 'user_tokens.user_id')
                ->where('user_logins.id', $user_id)
                ->select('user_logins.*', 'user_tokens.token')
                ->orderByDesc('user_tokens.created_at') // Order by token creation timestamp in descending order
                ->first();
                
            return response()->json(['status' => 200, 'error' => '', 'data' => $userToken]);
            
        } catch (\Exception $e) {
            // Using a more descriptive error message for a database error
            return response()->json(['status' => 500, 'error' => 'Error retrieving data from the database', 'data' => null]);
        }
    }
}

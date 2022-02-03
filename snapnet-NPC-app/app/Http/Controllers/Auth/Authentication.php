<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\AuthenticationService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class Authentication extends Controller
{
    protected $user;

    protected $rules = [
        'email' => 'required',
        'password' => 'required'
    ];

    public function loginUser(Request $request)
    {
        $user = User::where([
            'email' => $request->email,
        ])->first();

        if($user && Hash::check($request->password, $user->password)) {

            if($user->is_corp == FALSE) {
                return response()->json([
                    'status'    => 'false',
                    'message'   => 'Contact admin for more permission'
                ], 401);
            }

            return response()->json([
                'status' => true,
                'message' => 'You are logged in'
            ]);
        }
            return response()->json([
            'status'    => 'false',
            'message'   => 'User does not exist'
        ], 404);
    }
}
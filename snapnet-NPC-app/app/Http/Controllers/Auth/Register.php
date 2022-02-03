<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Http\Request;


class Register extends Controller
{
    protected $user;

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required|min:6'
    ];

    public function addNewUser(Request $request)
    {
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'invalid credential supplied'
                ], 400);
            }
        return UserService::createUser($request);
    }

        
}

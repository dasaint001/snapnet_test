<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthenticationService
{
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
                'status' => true
            ]);
        }
    }

}
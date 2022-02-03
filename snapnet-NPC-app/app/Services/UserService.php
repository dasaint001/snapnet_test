<?php


namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserService
{
    public static function createUser(Request $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->is_citizen = TRUE;
        $user->is_corp = TRUE;
        $user->save();

        return response()->json([
            'status'    => true
        ], 201);
    }


}
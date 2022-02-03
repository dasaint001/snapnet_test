<?php


namespace App\Services;

use App\Models\User;
use App\Models\Ward;
use App\Models\Citizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CitizenService
{
    public static function createCitizen(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if(!$user){
            return response()->json([
                'status'    => 'false',
                'message'   => 'User does not exist'
            ], 404);
        }
    
        $created_by = $user->name;

        $id = Ward::where('name', $request->ward_name)->get('id');
        $citizen = new Citizen;
        $citizen->name = $request->name;
        $citizen->gender = $request->email;
        $citizen->address = Hash::make($request->password);
        $citizen->is_citizen = TRUE;
        $citizen->ward_id = $id;
        $citizen->created_by = $created_by;
        $citizen->save();

        return response()->json([
            'status'    => true
        ], 201);
    }


}
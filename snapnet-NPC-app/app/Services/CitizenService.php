<?php


namespace App\Services;

use App\Models\User;
use App\Models\Ward;
use App\Models\Citizen;
use Illuminate\Http\Request;

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
        $citizen->address = $request->address;
        $citizen->is_citizen = TRUE;
        $citizen->ward_id = $id;
        $citizen->save();

        return response()->json([
            'status'    => true
        ], 201);
    }

    public static function editCitizen(Request $request, $id)
    {
        $citizen = Citizen::where('id', $id)->first();

        if (!$citizen) {
            throw new \InvalidArgumentException('Citizen could not be found');
        }

        $citizen->name = $request->name;
        $citizen->save();

        return response()->json([
            'status'    => true
        ], 200);
    }

    public static function getCitizen($id)
    {
        $citizen = Citizen::where('id', $id)->first();

        if (!$citizen) {
            throw new \InvalidArgumentException('Citizen could not be found');
        }

        return response()->json([
            'status'    => true,
            'data' => $citizen
        ], 200);
    }

    public static function getCitizens(Request $request)
    {
        $citizens = citizen::all();

        if (!$citizens) {
            throw new \InvalidArgumentException('No Citizen(s) found');
        }

        return response()->json([
            'status'    => true,
            'data' => $citizens
        ], 200);
    }

    public static function removeCitizen($id)
    {
        $citizen = Citizen::where('id', $id)->first();

        if (!$citizen) {
            throw new \InvalidArgumentException('Citizen could not be found');
        }

        $citizen->delete();

        return response()->json([
            'status'    => true,
            'message' => 'Citizen deleted successfully'
        ], 200);
    }


}
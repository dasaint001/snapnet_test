<?php


namespace App\Services;

use App\Models\User;
use App\Models\State;
use App\Models\Lga;
use Illuminate\Http\Request;

class LgaService
{
    public static function createLga(Request $request)
    {
        $stateId = State::where('name',$request->state_name)->get('id');
        $Lga = new Lga;
        $Lga->name = $request->name;
        $Lga->state_id = $stateId;
        $Lga->save();

        return response()->json([
            'status'    => true
        ], 201);
    }

         public static function editLga(Request $request, $id)
    {
        $lga = Lga::where('id', $id)->first();

        if (!$lga) {
            throw new \InvalidArgumentException('Start could not be found');
        }

        $lga->name = $request->name;
        $lga->save();

        return response()->json([
            'status'    => true
        ], 200);
    }

    public static function getLga($id)
    {
        $lga = Lga::where('id', $id)->first();

        if (!$lga) {
            throw new \InvalidArgumentException('Ward could not be found');
        }

        return response()->json([
            'status'    => true,
            'data' => $lga
        ], 200);
    }

    public static function getLgas(Request $request)
    {
        $lgas = lga::all();

        if (!$lgas) {
            throw new \InvalidArgumentException('No Lga(s) found');
        }

        return response()->json([
            'status'    => true,
            'data' => $lgas
        ], 200);
    }

    public static function removelga($id)
    {
        $lga = State::where('id', $id)->first();

        if (!$lga) {
            throw new \InvalidArgumentException('State could not be found');
        }

        $lga->delete();

        return response()->json([
            'status'    => true,
            'message' => 'Lga deleted successfully'
        ], 200);
    }

}
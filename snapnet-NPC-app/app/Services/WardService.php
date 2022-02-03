<?php


namespace App\Services;

use App\Models\State;
use App\Models\Lga;
use App\Models\Ward;
use Illuminate\Http\Request;

class WardService
{
    public static function createWard(Request $request)
    {
        $lgId = Lga::where('name', $request->lga_name)->get('id');
        $ward = new Ward;
        $ward->name = $request->name;
        $ward->lga_id = $lgId;
        $ward->save();

        return response()->json([
            'status'    => true
        ], 201);
    }

    public static function editWard(Request $request, $id)
    {
        $ward = Ward::where('id', $id)->first();

        if (!$ward) {
            throw new \InvalidArgumentException('Ward could not be found');
        }
        $lgId = Lga::where('name', $request->lga_name)->get('id');

        $ward->name = $request->name;
        $ward->lga_id = $lgId;
        $ward->save();

        return response()->json([
            'status'    => true
        ], 200);
    }

    public static function getWard($id)
    {
        $ward = Ward::where('id', $id)->first();

        if (!$ward) {
            throw new \InvalidArgumentException('Ward could not be found');
        }

        return response()->json([
            'status'    => true,
            'data' => $ward
        ], 200);
    }

    public static function getWards(Request $request)
    {
        $wards = Ward::all();

        if (!$wards) {
            throw new \InvalidArgumentException('No Ward(s) found');
        }

        return response()->json([
            'status'    => true,
            'data' => $wards
        ], 200);
    }

    public static function removeWard($id)
    {
        $ward = Ward::where('id', $id)->first();

        if (!$ward) {
            throw new \InvalidArgumentException('Ward could not be found');
        }

        $ward->delete();

        return response()->json([
            'status'    => true,
            'message' => 'Ward deleted successfully'
        ], 200);
    }

}
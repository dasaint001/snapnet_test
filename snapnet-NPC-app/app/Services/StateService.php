<?php


namespace App\Services;

use App\Models\State;
use Illuminate\Http\Request;

class StateService
{
    public static function createState(Request $request)
    {
        $Lga = new State;
        $Lga->name = $request->name;
        $Lga->save();

        return response()->json([
            'status'    => true
        ], 201);
    }

     public static function editState(Request $request, $id)
    {
        $state = State::where('id', $id)->first();

        if (!$state) {
            throw new \InvalidArgumentException('Start could not be found');
        }

        $state->name = $request->name;
        $state->save();

        return response()->json([
            'status'    => true
        ], 200);
    }

    public static function getState($id)
    {
        $state = State::where('id', $id)->first();

        if (!$state) {
            throw new \InvalidArgumentException('Ward could not be found');
        }

        return response()->json([
            'status'    => true,
            'data' => $state
        ], 200);
    }

    public static function getStates(Request $request)
    {
        $states = State::all();

        if (!$states) {
            throw new \InvalidArgumentException('No Ward(s) found');
        }

        return response()->json([
            'status'    => true,
            'data' => $states
        ], 200);
    }

    public static function removeState($id)
    {
        $state = State::where('id', $id)->first();

        if (!$state) {
            throw new \InvalidArgumentException('State could not be found');
        }

        $state->delete();

        return response()->json([
            'status'    => true,
            'message' => 'State deleted successfully'
        ], 200);
    }

}
<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Services\StateService;
use Illuminate\Http\Request;



class State extends Controller
{
    protected $rules = [
        'name' => 'required',
    ];

    public function addNewState(Request $request)
    {
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'invalid credential supplied'
            ], 400);
        }
       return StateService::createState($request);
    }

    public function updateWard(Request $request,$id)
    {
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'invalid credential supplied'
            ], 400);
        }
       return StateService::editState($request,$id);
    }

    public function allStates(Request $request)
    {
       return StateService::getStates($request);
    }

    public function deleteState(Request $request, $id)
    {
       return StateService::removeState($request, $id);
    }
}
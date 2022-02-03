<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Services\WardService;
use Illuminate\Http\Request;



class State extends Controller
{
    protected $rules = [
        'name' => 'required',
        'lga_name' => 'required'
    ];

    public function addNewWard(Request $request)
    {
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'invalid credential supplied'
            ], 400);
        }
       return WardService::createWard($request);
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
       return WardService::editWard($request,$id);
    }

    public function allWards(Request $request)
    {
       return WardService::getWards($request);
    }

    public function deleteWard(Request $request)
    {
       return WardService::removeWard($request);
    }

}
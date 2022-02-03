<?php

namespace App\Http\Controllers\Locations;

use App\Http\Controllers\Controller;
use App\Services\LgaService;
use Illuminate\Http\Request;



class Lga extends Controller
{
    protected $rules = [
        'name' => 'required',
        'state_name' => 'required',
    ];

    public function addNewLga(Request $request)
    {
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'invalid credential supplied'
            ], 400);
        }
       return LgaService::createLga($request);
    }

        public function updateLga(Request $request,$id)
    {
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'invalid credential supplied'
            ], 400);
        }
       return LgaService::editLga($request,$id);
    }

    public function allLgas(Request $request)
    {
       return LgaService::getLga($request);
    }

    public function deleteLga(Request $request, $id)
    {
       return LgaService::removeLga($request, $id);
    }
}
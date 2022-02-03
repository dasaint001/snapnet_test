<?php

namespace App\Http\Controllers\Citizens;

use App\Http\Controllers\Controller;
use App\Services\CitizenService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Citizen;


class Citizens extends Controller
{
    protected $user;

    protected $rules = [
        'name' => 'required',
        'user_email' => 'required',
        'gender' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'ward_name' => 'required'
    ];

    public function addNewCitizen(Request $request)
    {
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'invalid credential supplied'
            ], 400);
        }
       return CitizenService::createCitizen($request);
    }

        public function updateCitizen(Request $request,$id)
    {
        $validator = \Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'invalid credential supplied'
            ], 400);
        }
       return CitizenService::editCitizen($request,$id);
    }

    public function allCitizens(Request $request)
    {
       return CitizenService::getCitizen($request);
    }

    public function deleteCitizen(Request $request, $id)
    {
       return CitizenService::removeCitizen($request, $id);
    }
}
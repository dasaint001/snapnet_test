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
       return CitizenService::createCitizen($request);
    }
}
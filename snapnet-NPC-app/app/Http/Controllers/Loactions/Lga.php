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
       return LgaService::createLga($request);
    }
}
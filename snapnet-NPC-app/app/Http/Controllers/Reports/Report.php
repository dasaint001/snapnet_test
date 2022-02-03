<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Ward;
use App\Models\Lga;
use App\Models\Citizen;
use Illuminate\Http\Request;



class Report extends Controller
{
    public function getReports(Request $request)
    {
       $citizens = Citizen::all();
       $lgas = Lga::all();
       $wards = Ward::all();
       $users = User::all();

       $user_count = $users->count();
       $ward_count = $wards->count();
       $lga_count = $lgas->count();
       $citizen_count = $citizens->count();

        return response()->json([
            'status'    => true,
            'data' => [
                'count' => [
                    'users' =>  $user_count ,
                    'citizens' => $citizen_count,
                    'lgas' => $lga_count,
                    'wards' => $ward_count
                ],
                'user' => $users,
                'citizens' => $citizens,
                'wards' => $wards
            ]
        ], 200);
    }

}
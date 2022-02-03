<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\Auth\Register;
Use App\Http\Controllers\Auth\Authentication;
Use App\Http\Controllers\Auth\Locations;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

$user = [   
    'namespace' => 'User',
    'prefix'    => 'user'
];

$router->group($user, function () use ($router) {

    $router->post('/create', 'Register@addNewUser');
    // $router->get('/resendusercredentials/{id}/{app_key}', 'User@resendUserCredentials');
    // $router->post('/my-activity-log', 'MyActivity@myActivityLog');
    // $router->get('/getrole/{app_key}', 'User@getUserRole');
});

// $auth = [
//     'namespace' => 'Auth',
//     'prefix'    => 'auth'
// ];


// $router->group($auth, function () use ($router) {
//     $router->post('/register', 'Register@addNewUser');
// });


//Route::post('/register', 'Auth/Register@addNewUser');
Route::post('register',[Register::class,'addNewUser']);
Route::post('login',[Authentication::class,'loginUser']);

//Routes for Wards
Route::post('ward/create',[Locations::class,'addNewWard']);
Route::delete('ward/delete',[Locations::class,'deleteWard']);
Route::put('ward/edit',[Locations::class,'updateWard']);
Route::get('wards',[Locations::class,'allWards']);

//Routes for States
Route::post('state/create',[Locations::class,'addNewState']);
Route::delete('state/delete',[Locations::class,'deleteState']);
Route::put('state/edit',[Locations::class,'updateState']);
Route::get('states',[Locations::class,'allStates']);

//Routes for LGAs
Route::post('lga/create',[Locations::class,'addNewLga']);
Route::delete('lga/delete',[Locations::class,'deleteLga']);
Route::put('lga/edit',[Locations::class,'updateLga']);
Route::get('lgas',[Locations::class,'allLgas']);

//Routes for Citizen
Route::post('citizen/create',[Locations::class,'addNewCitizen']);
Route::delete('citizen/delete',[Locations::class,'deleteCitizen']);
Route::put('citizen/edit',[Locations::class,'updateCitizen']);
Route::get('citizens',[Locations::class,'allCitizens']);
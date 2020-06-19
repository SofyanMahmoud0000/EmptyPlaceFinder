<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(["middleware" => "Non_authentication"], function(){
    Route::post("/create","HospitalC@Create");
    Route::post("/signin","HospitalC@SignIn");
    });

Route::group(["middleware" =>  "Authentication"], function (){
    Route::post("/changepassword","HospitalC@ChangePassword");
    Route::delete("/deletephone","HospitalC@DeletePhone");
    Route::get("/addphone","HospitalC@AddPhone");
    Route::delete("/logout","HospitalC@LogOut");
    Route::get("/update","HospitalC@Update");
    Route::get("/getdata","HospitalC@GetData");

});

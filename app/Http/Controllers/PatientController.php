<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hospital;
use Validator;
use DB;
class PatientController extends Controller
{
    //
    /**
    * find_hospitals_by_location  
    * @bodyParam xloc float required .	
    * @bodyParam yloc float required .	
    * @bodyParam type string required .
    * @response 200 { 
    *   "hospitals": [
    *   {
    *     "id": 10,
    *     "username": "willa.feil@example.com",
    *     "name": "Simonis-Runolfsson",
    *     "address_location": "33425 Zion Underpass Suite 088\nGreenburgh, ID 39725-9264",
    *     "x_location": 89,
    *     "y_location": 13.1,
    *     "free_slots_high": 22,
    *     "free_slots_medium": 15,
    *     "free_slots_low": 45,
    *     "price_high": 5367,
    *     "price_medium": 678,
    *     "price_low": 327,
    *     "created_at": "2020-06-19T13:25:48.000000Z",
    *     "updated_at": "2020-06-19T13:25:48.000000Z",
    *     "phones": [
    *       23432432,
    *       101221321
    *     ],
    *     "distance": 12.984991336154215
    *   },
    *   {
    *     "id": 9,
    *     "username": "cleo.ernser@example.net",
    *     "name": "Hill, Stamm and Schuster",
    *     "address_location": "51897 Lera Road\nNorth Thaliatown, MT 94461",
    *     "x_location": 79,
    *     "y_location": 20.8,
    *     "free_slots_high": 19,
    *     "free_slots_medium": 51,
    *     "free_slots_low": 46,
    *     "price_high": 5832,
    *     "price_medium": 1557,
    *     "price_low": 650,
    *     "created_at": "2020-06-19T13:25:48.000000Z",
    *     "updated_at": "2020-06-19T13:25:48.000000Z",
    *     "phones": [
    *       555555,
    *       333
    *     ],
    *     "distance": 21.015232570685484
    *   }
    *	]
    *}
    *
    * @response 404 {
    *    "error" : ""
    * }
    */
    function find_hospitals_by_location(Request $request){
        
        $Validation = [
            "xloc"          => "required|numeric",
            "yloc"          => "required|numeric",
            "type"          => "required|string"
        ];
        
        $Validate = Validator::make($request->all(), $Validation);
        
        if ($Validate->fails())
            return response()->json(["error"=> $Validate->messages()], 404);
        if ($request['type'] != 'high' && $request['type'] != 'medium' && $request['type'] !='low')
            return response()->json(["error"=> "invalid type entry"], 404);
        
        $xloc = $request['xloc'];
        $yloc = $request['yloc'];
        $type = $request['type'];

        $query = "SELECT name, address_location, 
        x_location, y_location , 
        free_slots_high, free_slots_medium, free_slots_low,
        price_high, price_medium,price_low
        FROM hospital WHERE free_slots_" . $type . " > 0";
        $hospitals = Hospital::where("free_slots_" . $type , '>', 0)->with('phones')->get();
        $hospitals = json_decode(json_encode($hospitals));
        foreach($hospitals as $hospital){
            $distance = sqrt( pow(($xloc - $hospital->x_location),2) + pow(($yloc - $hospital->y_location),2) ) ;
            $hospital->distance = $distance;
        }
        usort($hospitals, function($a, $b) { 
            return $a->distance < $b->distance ? -1 : 1; //Compare the distances
        });                                                                                                                                                                                                        
        
        return response()->json(["hospitals" => $hospitals], 200);
    }

    /**
    * get_all_hospitals  
    * @response 200 { 
    *   "hospitals": [
    *   {
    *     "id": 10,
    *     "username": "willa.feil@example.com",
    *     "name": "Simonis-Runolfsson",
    *     "address_location": "33425 Zion Underpass Suite 088\nGreenburgh, ID 39725-9264",
    *     "x_location": 89,
    *     "y_location": 13.1,
    *     "free_slots_high": 22,
    *     "free_slots_medium": 15,
    *     "free_slots_low": 45,
    *     "price_high": 5367,
    *     "price_medium": 678,
    *     "price_low": 327,
    *     "created_at": "2020-06-19T13:25:48.000000Z",
    *     "updated_at": "2020-06-19T13:25:48.000000Z",
    *     "phones": [
    *       123,
    *       444
    *     ]
    *    
    *   },
    *   {
    *     "id": 9,
    *     "username": "cleo.ernser@example.net",
    *     "name": "Hill, Stamm and Schuster",
    *     "address_location": "51897 Lera Road\nNorth Thaliatown, MT 94461",
    *     "x_location": 79,
    *     "y_location": 20.8,
    *     "free_slots_high": 19,
    *     "free_slots_medium": 51,
    *     "free_slots_low": 46,
    *     "price_high": 5832,
    *     "price_medium": 1557,
    *     "price_low": 650,
    *     "created_at": "2020-06-19T13:25:48.000000Z",
    *     "updated_at": "2020-06-19T13:25:48.000000Z",
    *     "phones": [
    *       555
    *     ]
    *   }
    *	]
    *}
    *
    * @response 404 {
    *    "error" : ""
    * }
    */ 
    function get_all_hospitals(Request $request){
        $hospitals = Hospital::select()->with('phones')->get();
        return response()->json(["hospitals" => $hospitals], 200);
    }
}

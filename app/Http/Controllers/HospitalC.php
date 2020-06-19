<?php

namespace App\Http\Controllers;
use JWTAuth;
use Illuminate\Http\Request;
use App\Hospital;
use Validator;
use App\Phone;


/**
* @group Hospital
* The class of the hospital 
*/
class HospitalC extends Controller
{

    /**
    * create
    * @bodyParam username string required .	
    * @bodyParam password string required .	
    * @bodyParam password_confirmation string required the confirmation of input password.	
    * @bodyParam name string required .	
    * @bodyParam address_location string required .	
    * @bodyParam x_location string required .	
    * @bodyParam y_location string required .	
    * @bodyParam free_slots_high string required .	
    * @bodyParam free_slots_medium string required .	
    * @bodyParam free_slots_low string required .	
    * @bodyParam price_high string required .	
    * @bodyParam price_medium string required .	
    * @bodyParam price_low string required .	
    *
    *
    * @response 200 {
    *  "Hospital": {
    *   "username":"",
    *   "name":"",
    *   "address_location":"",
    *   "x_location":"",
    *   "y_location":"",
    *   "free_slots_high":"",
    *   "free_slots_medium":"",
    *   "free_slots_low":"",
    *   "price_high":"",
    *   "price_medium":"",
    *   "price_low":""
    * },
    *  "token": "",
    *  "token_type": ""   
    * }
    *
    * @response 405 {
    *    "error" : ""
    * }
    */
    public function Create(Request $request){

        $Validation = [
            "username"          => "required|string|min:5|unique:hospital,username",
            "password"          => "required|string|confirmed|min:5",
            "name"              => "required|string|min:5", 
            "address_location"  => "required|string",
            "x_location"        => "required|numeric",
            "y_location"        => "required|numeric",
            "free_slots_high"   => "required|numeric|min:0",
            "free_slots_medium" => "required|numeric|min:0",
            "free_slots_low"    => "required|numeric|min:0",
            "price_high"        => "required|numeric|min:0",
            "price_medium"      => "required|numeric|min:0",
            "price_low"         => "required|numeric|min:0"
        ];
        
        $Validate = Validator::make($request->all(), $Validation);

        if(!$Validate->fails()){
            $Data = $request->all();
            $Hospital = Hospital::create([
                "username"          =>$request->username, 
                "password"          =>$request->password,
                "name"              =>$request->name,
                "address_location"  =>$request->address_location,
                "x_location"        =>$request->x_location,
                "y_location"        =>$request->y_location,
                "free_slots_high"   =>$request->free_slots_high,
                "free_slots_medium" =>$request->free_slots_medium,
                "free_slots_low"    =>$request->free_slots_low,
                "price_high"        =>$request->price_high,
                "price_medium"      =>$request->price_medium,
                "price_low"         =>$request->price_low
            ]);

            $token = JWTAuth::attempt(["username" => $request->username  , "password" => $request->password]);
            $getting = [
                "username",
                "name",
                "address_location",
                "x_location",
                "y_location",
                "free_slots_high",
                "free_slots_medium",
                "free_slots_low",
                "price_high",
                "price_medium",
                "price_low"
            ];
            
            $show = Hospital::find($Hospital->id,$getting);

            return response()->json(["Hospital"=> $show, "token" => $token, "token_type" => "bearer", "expires_in" => auth()->factory()->getTTL() * 24], 200);
        }else{
            return response()->json(["error"=> $Validate->messages()->first()], 405);
        }
    }

    /**
    * signin 
    * @bodyParam username string required .	
    * @bodyParam password string required .	
    *
    * @response 200 {
    *  "Hospital": {
    *   "username":"",
    *   "name":"",
    *   "address_location":"",
    *   "x_location":"",
    *   "y_location":"",
    *   "free_slots_high":"",
    *   "free_slots_medium":"",
    *   "free_slots_low":"",
    *   "price_high":"",
    *   "price_medium":"",
    *   "price_low":""
    * },
    *  "token": "",
    *  "token_type": ""   
    * }
    *
    * @response 405 {
    *    "error" : ""
    * }
    */
    public function SignIn(Request $request){
        $Validation = [
            "username"          => "required|string",
            "password"          => "required|string",
        ];

        $Validate = Validator::make($request->all(), $Validation);
        
        if(!$Validate->fails()){
            if($token = JWTAuth::attempt(["username" => $request->username  , "password" => $request->password])){
                $getting = [
                    "username",
                    "name",
                    "address_location",
                    "x_location",
                    "y_location",
                    "free_slots_high",
                    "free_slots_medium",
                    "free_slots_low",
                    "price_high",
                    "price_medium",
                    "price_low"
                ];
                $Hospital = Hospital::where("username",$request->username)->first();
                $show =  Hospital::find($Hospital->id,$getting);
                return response()->json(["Hospital"=> $show, "token" => $token, "token_type" => "bearer", "expires_in" => auth()->factory()->getTTL() * 60], 200);
            }else{
                return response(["errors" => "The email or password is invalid."],405);
            }
        }
        return response()->json(["error"=> $Validate->messages()->first()], 405);
    }



    /**
    * changepassword 
    * @authenticated
    * @bodyParam oldpassword string required the old password.	
    * @bodyParam password string required the new password.	
    * @bodyParam password_confirmation string required the confirmation of new password.	
    *
    * @response 200 {
    *  "message": ""
    * }
    * @response 405 {
    *    "error" : ""
    * }
    */
    public function ChangePassword(Request $request){
        $Validation = [
            "oldpassword"       => "required|string|min:5",
            "password"          => "required|string|confirmed|min:5"
        ];

        $Validate = Validator::make($request->all() , $Validation);

        if(!$Validate->fails()){
            if(JWTAuth::attempt(["username" => auth()->user()->username  , "password" => $request->oldpassword])){
                $Hospital = Hospital::find(auth()->user()->id);
                $Hospital->password = $request->password;
                $Hospital->save();
                return response()->json(["message"=> "You have change the password"], 200);                
            }
            return response()->json(["error"=> "The old password is not correct"], 405);
        }
        return response()->json(["error"=> $Validate->messages()->first()], 405);
    }


    /**
    * addphone 
    * @authenticated
    * @bodyParam phone string required the phone you want to add.	
    * @response 200 {
    *  "message": ""
    * }
    * @response 405 {
    *    "error" : ""
    * }
    */
    public function AddPhone(Request $request){
        $Validation = [
            "phone"  => ["required", "string", "max:11", "regex:/^0(10|11|12|15|16)\d{8}$/","unique:phones,phone"]
        ];

        $Validate = Validator::make($request->all() , $Validation);

        if(!$Validate->fails()){
            Phone::create([
                "phone" => $request->phone,
                "hospital_id" => auth()->user()->id
            ]);
            return response()->json(["message"=> "You have added a phone number for this hospital"], 200);                
        }
        return response()->json(["error"=> $Validate->messages()->first()], 405);
    }


    /**
    * deletephone 
    * @authenticated
    * @bodyParam phone string required the phone you want to delete.	
    * @response 200 {
    *  "message": ""
    * }
    * @response 405 {
    *    "error" : ""
    * }
    */
    public function DeletePhone(Request $request){
        $Validation = [
            "phone"  => ["required", "string", "max:11", "regex:/^0(10|11|12|15|16)\d{8}$/","exists:phones,phone"]
        ];

        $Validate = Validator::make($request->all() , $Validation);

        if(!$Validate->fails()){
            $phone = Phone::where("hospital_id",auth()->user()->id)->where("phone", $request->phone)->first();
            $phone->delete();
            return response()->json(["message"=> "You have deleted the phone (" . $request->phone . ") from this hospital"], 200);                
        }
        return response()->json(["error"=> $Validate->messages()->first()], 405);
    }


    /**
    * logout 
    * @authenticated	
    * @response 200 {
    *  "message": "Good Bey"
    * }
    */
    public function LogOut(){
        auth()->logout();
        return response()->json(["message"=> "Good Bye"], 200);
    }


    /**
    * update 
    * @authenticated 
    * @bodyParam name string required .	
    * @bodyParam address_location string required .	
    * @bodyParam free_slots_high string required .	
    * @bodyParam free_slots_medium string required .	
    * @bodyParam free_slots_low string required .	
    * @bodyParam price_high string required .	
    * @bodyParam price_medium string required .	
    * @bodyParam price_low string required .	
    * @response 200 {
    *  "message": ""
    * }
    * @response 405 {
    *    "error" : ""
    * }
    */
    public function Update(Request $request){
        $Validation = [
            "name"              => "required|string|min:5", 
            "address_location"  => "required|string",
            "free_slots_high"   => "required|numeric|min:0",
            "free_slots_medium" => "required|numeric|min:0",
            "free_slots_low"    => "required|numeric|min:0",
            "price_high"        => "required|numeric|min:0",
            "price_medium"      => "required|numeric|min:0",
            "price_low"         => "required|numeric|min:0"
        ];
        
        $Validate = Validator::make($request->all(), $Validation);

        if(!$Validate->fails()){
            $Hospital = auth()->user();
            $Hospital->name = $request->name;
            $Hospital->address_location = $request->address_location;
            $Hospital->free_slots_high = $request->free_slots_high;
            $Hospital->free_slots_medium = $request->free_slots_medium;
            $Hospital->free_slots_low = $request->free_slots_low;
            $Hospital->price_high = $request->price_high;
            $Hospital->price_medium = $request->price_medium;
            $Hospital->price_low = $request->price_low;
            $Hospital->save();

            return response()->json(["message"=> "You have updated you information"], 200);
        }
        return response()->json(["error"=> $Validate->messages()->first()], 405);
    }
    /**
     * @hideFromAPIDocumentation
     */
    public function GetData(Request $request){
        $getting = [
            "username",
            "name",
            "address_location",
            "x_location",
            "y_location",
            "free_slots_high",
            "free_slots_medium",
            "free_slots_low",
            "price_high",
            "price_medium",
            "price_low"        
        ];

        $Hospital = Hospital::find(auth()->user()->id,$getting);

        return response()->json(["Hospital"=> $Hospital], 200);

    }
}

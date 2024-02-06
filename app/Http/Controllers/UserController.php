<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function list()
    {
        return User::all();
    }

    public function add(Request $request){

        $user = new User;
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        $registered= $user->save();
        if($registered)
        {
            return ["Result"=>"New user has been saved"];
        }
        else{
            return ["Result"=>"Failed"];
        }
        
    }

    public function update(Request $request){
        $user = User::find($request->id);
        $user->name=$request->name;
        $user->email=$request->email;
        $user->password = Hash::make($request->password);
        $result = $user->save();

        if($result){
            return ["result"=>"Data is updated po"];
        }
        else{
            return ["result"=>"Data is not updated"];
        }
        
    }

    public function search($name){
        return User::where("name","like","%".$name."%")->get();

    }

    public function delete($id){
        $user = User::find($id);
        $result = $user->delete();

        if ($result){
            return ["result"=>"record has been deleted"];
        }
        else{
            return ["result"=>"delete operationg is failed"];
        }
        
    }

    public function testData(Request $request){

        $rules=array(
            "name"=>"required|min:5|max:15",
            "email" => "required|min:5|max:20|regex:/^.+@.+\..+$/",
            "password"=>"required|min:6|max:20"
        );
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return $validator->errors();
        }else{
            $user = new User;
            $user->name=$request->name;
            $user->email=$request->email;
            $user->password = Hash::make($request->password);
            $result=$user->save();

            if($result)
            {
                return ["Result"=>"New user has been saved"];
            }
            else{
                return ["Result"=>"Failed"];
            }
        }
        
    }
}

<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Log; 
// use Orchestra\Parser\Xml\Facade as XmlParser;
// use Mtownsend\XmlToArray\XmlToArray;
// use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    
    public function index()
    {
        return User::all();
    }

    public function store(Request $request)
    {
            
    }
    public function register(UserRequest $request){
    
        // $validator=$request->validated();
        // Log::info($request);
        try{
            $user = User::create([
                'name'=>$request['fname'].' '.$request['lname'],
                'email'=>$request['email'],
                'password'=>bcrypt($request['password']),
                'addressline1'=>$request['addressline1'],
                'addressline2'=>!empty($request['addressline2']) ? $request['addressline2'] : '',
                'pincode'=>$request['pincode'],
                'phone_number'=>$request['phone_number']
            ]);
        
            $token=$user->createToken('myapptoken')->plainTextToken;
            $response=[
                'user id' => $user['id'],
                'token'=> $token
            ];
            return response($response,201);
        }
        catch(Exception $e){
            $response=$e->getMessage();
            return response($response);
        }
        
    }
    // public function login(Request $request){
    //     $fields=$request->validate([
    //         'email' => 'required|string',
    //         'password' => 'required|string'
    //     ]);
    //     $user=User::where(
    //         'email',$fields['email'])->first();
    //    if(!$user || !Hash::check($fields['password'],$user->password)){
    //         return response([
    //             'message'=>"Bad credentials"
    //         ],401);
    //    }
    //     $token=$user->createToken('myapptoken')->plainTextToken;
    //     $response=[
    //         'user id' => $user['id'],
    //         'token'=> $token
    //     ];
    //     return response($response,201);
    // }
    // public function logout(Request $request){
    //     auth()->user()->tokens()->delete();
    //     return[
    //         'message' =>'Logged out'
    //     ];
    // }
    
}

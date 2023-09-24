<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    function login(Request $request){
        $user = DB::table('users')->where('email',$request->email)->first();
        if ( !$user || !Hash::check($request->password,$user->password)){
            return response()->json([
                'message'=>'Invalid UserName Or Password'
            ],500);
        }
        return response()->json([
            'message'=>'Sucessfully logged in'
        ]);
    }
}

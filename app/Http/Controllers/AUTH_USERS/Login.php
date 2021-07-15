<?php

namespace App\Http\Controllers\AUTH_USERS;

use App\Http\Controllers\Auto\Refresh;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\User;

;

use Illuminate\Http\Request;

class Login extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    protected function respondWithToken($token)
    {
        return response()->json(['token' => $token, 'expires_in' => auth()->factory()->getTTL() * 60]);
    }

    public function login(Request $req)
    {
        $test_database=User::first();

        if(!$test_database){
                $root = User::create(['id' => 1,'fname' =>'Ibrahim','lname' =>'Ahmed','password' => 12345678,'email' => 'hema.1998.man@gmail.com','type' => 1 , 'phone' => "01207053244" , 'created_at'=>now() ]);
                return response()->json(['Root User'=> $root  ]);
        }

        $req->validate(['email' => 'required|email:rfc,dns', 'password' => 'required|min:8']);
        $credentials = $req->only('email', 'password');

        if ($token = auth()->attempt($credentials)){
                $this->respondWithToken($token);

                $user = auth()->user();

                return response()->json([
                        "token" => $token,    //  "id" => auth()->user()->id,
                        "fname" => $user->fname,     "lname" => $user->lname,
                        //"phone" => $user->phone,
                    //  "email" => $user->email,
                      'type' =>  $user->type,
                ]);
        }
        else{ return response()->json(['err' => "Wrong Credintials ,Try a valid E-mail or password"], 401);}
    }}

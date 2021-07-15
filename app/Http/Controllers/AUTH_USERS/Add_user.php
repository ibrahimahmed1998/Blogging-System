<?php namespace App\Http\Controllers\AUTH_USERS;
use App\Http\Controllers\Controller;
use App\Http\Requests\Signup_;
use App\Models\User;

class Add_user extends Controller{
    public function __construct() {  $this->middleware('auth:api', ['except' => ['add_user']]); }

    public function add_user(Signup_ $req){
       User::create(['id' => $req->id,'fname' => $req->fname,
                     'lname' => $req->lname,'password' => $req->password,'email' => $req->email,
                     'type' => 2, 'phone' => $req->phone, 'created_at'=>now() ]);

       return response()->json(['success' => 'joined ... '], 201);
}}

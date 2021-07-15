<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function __construct() {  $this->middleware('auth:api', ['except' => ['']]); }

    public function control(Request $req)
    {
       $user = auth()->user();

       $comments =  Comment::create([
            'body'=>$req->body,
            'articles_id'=>$req->articles_id,
            'user_id'=>$user->id,   ]);

        return response()->json(['success'=>$comments]);
    }

    public function list(Request $req)
    {
       $arr = [];
       $comments =  Comment::all();

       for ($i = 0; $i < sizeof($comments); $i++)
       {
           $arr[] = $comments[$i];
       }

       return  $arr;

    }
}

<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Article  ;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function control(Request $req)
    {
       $user = auth()->user();

       $art =  Article::create([
            'title'=>$req->title,
            'body'=>$req->body,
            'sub_title'=>$req->sub_title,
            'user_id'=>$user->id,
            'category'=>$req->category ]);

        return response()->json(['success'=>$art]);
    }
}

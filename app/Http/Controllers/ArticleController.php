<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\User;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['']]);
    }

    public function control(Request $req)
    {
        $user = auth()->user();
        if ($user->type != 1) {
            return response()->json(['err' => "Cannot Add Articles Admin Only"], 401);
        } else {
            $art =  Article::create([
                'title' => $req->title,
                'body' => $req->body,
                'sub_title' => $req->sub_title,
                'user_id' => $user->id,
                'category' => $req->category
            ]);

            return response()->json(['success' => $art]);
        }
    }

    public function list()
    {
        $all = Article::all();
        $arr = [];

        for ($i = 0; $i < sizeof($all); $i++) {
            $arr[] = $all[$i];
        }

        return  $arr;
    }
}

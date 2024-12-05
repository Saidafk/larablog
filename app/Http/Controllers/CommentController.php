<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store (Request $request,Article $article){


        //dd($article->comments->content);

        $content = request('content');
        $articleId = $article->id;
        //dd($article);

        
        Comment::create([
            'content' => $content,
            'article_id' => $articleId,
            'user_id' => Auth::user()->id
        ]);

        
        return view('public.detail' , ['article' => $article, 'user' => Auth::user()]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{

    public function store (User $user, Article $article){


        dd($article->comment);
        Comment::create([
            'content' => $content,
            'article_id' => $articleId,
            'user_id' => Auth::user()->id
        ]);

        return view('public.detail' , ['article' => $article, 'user' => $user]);
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PublicController extends Controller
{
    public function index(User $user)
{
    
    // On récupère les articles publiés de l'utilisateur
    $articles = Article::orderBy('created_at', 'desc')->paginate(3);

    $user = User::find($user->id);

    //dd($user);

    // On retourne la vue
    return view('public.index', [
        'articles' => $articles,
        'user' => $user
    ]);
}

public function show(User $user, Article $article)
{

    $user = User::find($user->id);

    if ($article->draft == 0){

        return view('public.detail' , ['article' => $article, 'user' => $user]);
    }

    return Redirect::route('public.index', [
        'article' => $article,
        'user' => $user
    ])->with('error', 'Vous ne pouvez pas acceder aux informations');
    
}

}

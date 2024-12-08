<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Auth as Enter;

class UserController extends Controller
{
    public function create()
{
    return view('articles.create')->with('success', 'Nouvelle article ajouté !');
}


public function store(Request $request)
{
    // On récupère les données du formulaire
    $data = $request->only(['title', 'content', 'draft']);

    // Créateur de l'article (auteur)
    $data['user_id'] = Enter::user()->id;

    // Gestion du draft
    $data['draft'] = isset($data['draft']) ? 1 : 0;

    // On crée l'article
    $article = Article::create($data); // $Article est l'objet article nouvellement créé

    return redirect()->route('dashboard')->with('success', 'Nouvelle article ajouté !');
}

public function index(Article $article)
{
    // On récupère l'utilisateur connecté.
    $user = Auth::user();

    if ($article->user_id !== Auth::user()->id) {
        abort(403);
    }

    $articles = Article::where('user_id', $user->id)->orderBy('created_at', 'desc')->paginate(3);

    // On retourne la vue.
    return view('dashboard', [
        'articles' => $articles,
        'user' => $user
            ])->with('success', 'Nouvelle article ajouté !');
}

public function edit(Article $article)
{
    // On vérifie que l'utilisateur est bien le créateur de l'article
    if ($article->user_id !== Auth::user()->id) {
        abort(403);
    }


    // On retourne la vue avec l'article
    return view('articles.edit', [
        'article' => $article
    ]);
}

public function update(Request $request, Article $article)
{
    // On vérifie que l'utilisateur est bien le créateur de l'article
    if ($article->user_id !== Auth::user()->id) {
        abort(403);
    }

    // On récupère les données du formulaire
    $data = $request->only(['title', 'content', 'draft']);

    // Gestion du draft
    $data['draft'] = isset($data['draft']) ? 1 : 0;

    // On met à jour l'article
    $article->update($data);

    

    // On redirige l'utilisateur vers la liste des articles (avec un flash)
    return redirect()->route('dashboard')->with('success', 'Article mis à jour !');
}

public function remove(Article $article){

    
    if ($article->user_id !== Auth::user()->id) {
        abort(403);
    }

    $article->delete();

    return redirect()->route('dashboard', [
        'article' => $article
    ])->with('success', 'Article supprimé !');
}

}

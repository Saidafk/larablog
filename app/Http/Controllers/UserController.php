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
    return view('articles.create');
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

    dd($article);


    // Exemple pour ajouter la catégorie 1 à l'article
    // $article->categories()->sync(1);

    // Exemple pour ajouter des catégories à l'article
    // $article->categories()->sync([1, 2, 3]);

    // Exemple pour ajouter des catégories à l'article en venant du formulaire
    // $article->categories()->sync($request->input('categories'));

    // On redirige l'utilisateur vers la liste des articles
    return redirect()->route('dashboard');
}

public function index(Article $article)
{
    // On récupère l'utilisateur connecté.
    $user = Auth::user();

    $articles = Article::orderBy('created_at', 'desc')->paginate(3);

    dd($articles);

    // On retourne la vue.
    return view('dashboard', [
        'articles' => $articles,
        'user' => $user
            
    ]);
}

public function edit(Article $article)
{
    // On vérifie que l'utilisateur est bien le créateur de l'article
    if ($article->user_id !== Auth::user()->id) {
        abort(403);
    }

    dd($articles);

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

    dd($articles);

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

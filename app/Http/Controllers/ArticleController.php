<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;
use App\Models\Article;
use Illuminate\Support\Facades\Hash;

class ArticleController extends Controller
{
    public function toAjout()
    {
        return view('articles.homeAuteur');
    }
    //
    public function store(Request $request)
    {
        // Récupération de l'auteur connecté
        $auteur = session()->get('auteur');
    
        // Récupération des champs du formulaire
        $titre = $request->input('titre');
        $contenu = $request->input('contenu');
        $description = $request->input('description');
        $image = null;
        
        // Vérification de l'existence du fichier image
        if ($request->hasFile('image')) {
            $path=$request->file('image')->store('public/images');

            $filename= basename($path);
            $file=storage_path('app/' . $path);
            $contents=file_get_contents($file);
            // Conversion de l'image en base64
            $image = base64_encode($contents);
        }
    
        // Insertion de l'article dans la base de données
        $article = new Article([
            'idauteur' => $auteur->id,
            'titre' => $titre,
            'image' => $image,
            'datecreation' => now(),
            'contenu' => $contenu,
            'statut' => 0,
            "description" => $description
        ]);
    
        $article->save();
    
        // Redirection vers la page d'accueil avec un message de succès
        return view('articles.homeAuteur')->withErrors(['email' => 'Ajouté avec succes']);
    }

    public function listeparAuteur()
    {
        $auteur = session()->get('auteur');
        $articles = Article::where('idauteur', $auteur->id)->get();
    
        return view('articles.listeparAuteur', compact('articles'));
    }

    public function modifierArticle($id)
    {
        $article = Article::find($id);
    
        return view('articles.editArticle', compact('article'));
    }

    public function confirmerModifier(Request $request)
{
    // Récupération de l'article à modifier
    $article = Article::findOrFail($request->input('id'));

    $image = null;
        
    // Vérification de l'existence du fichier image
    if ($request->hasFile('image')) {

        // Récupération du fichier image
        $image = $request->file('image');
      
        $filename= uniqid(). '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'),$filename);
        $imagepath=public_path('uploads/' . $filename);
        // Conversion de l'image en base64
        $image = base64_encode(file_get_contents($imagepath));
    }
    
    // Mise à jour des champs modifiés
    $article->titre = $request->input('titre');
    $article->titre = $request->input('description');
    $article->contenu = $request->input('contenu');
    $article->statut = 0;
    $article->image = $image;
    
    // Enregistrement des modifications dans la base de données
    $article->save();
    $auteur = session()->get('auteur');
    $articles = Article::where('idauteur', $auteur->id)->get();
    // Redirection vers la page d'accueil avec un message de succès
    return view('articles.listeparAuteur', compact('articles'))->withErrors(['email' => 'Ajouté avec succes']);
}

public function liste()
{
    $articles = Article::orderBy('statut')->get();
    return view('articles.homeAdmin', compact('articles'));
}


public function validerArticle($id)
{
    // Récupération de l'article à modifier
    $article = Article::findOrFail($id);

  
    $article->statut = 1;
    // Enregistrement des modifications dans la base de données
    $article->save();
    return redirect()->route('articles.liste');
}

}

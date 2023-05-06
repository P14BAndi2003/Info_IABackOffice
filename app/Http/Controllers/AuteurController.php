<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auteur;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
class AuteurController extends Controller
{
    //
    public function logAuteur()
    {
        return view('articles.loginAuteur');
    }

    public function login(Request $request)
{
    // Récupérer les champs email et mot de passe du formulaire de connexion
    $email = $request->input('email');
    $mdp = $request->input('mdp');

    // Chercher l'auteur correspondant à l'email donné
    $auteur = Auteur::where('email', $email)->first();

    // Vérifier si l'auteur existe et si le mot de passe est correct
    if ($auteur && $mdp == $auteur->mdp) {
        // Authentification réussie, enregistrer l'auteur dans la session
        session()->put('auteur', $auteur);

        // Rediriger l'utilisateur vers la page d'accueil
        return view('articles.homeAuteur');
    } else {
        // Authentification échouée, afficher un message d'erreur et rediriger vers la page de connexion
        return view('articles.loginAuteur')->withErrors(['email' => 'Adresse email ou mot de passe incorrect']);
    }
}

public function logout() 
{
    Session::forget('auteur');
    return view('articles.loginAuteur');
}

}

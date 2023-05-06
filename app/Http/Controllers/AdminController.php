<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    //
    public function logAdmin()
    {
        return view('articles.loginAdmin');
    }

    public function login(Request $request)
{
    // Récupérer les champs email et mot de passe du formulaire de connexion
    $email = $request->input('email');
    $mdp = $request->input('mdp');

    // Chercher l'admin correspondant à l'email donné
    $admin = Admin::where('email', $email)->first();

    // Vérifier si l'admin existe et si le mot de passe est correct
    if ($admin && $mdp == $admin->mdp) {
        // Authentification réussie, enregistrer l'admin dans la session
        session()->put('admin', $admin);

        // Rediriger l'utilisateur vers la page d'accueil
        return redirect()->route('articles.liste');
    } else {
        // Authentification échouée, afficher un message d'erreur et rediriger vers la page de connexion
        return view('articles.loginAdmin')->withErrors(['email' => 'Adresse email ou mot de passe incorrect']);
    }
}
public function logout() 
{
    Session::forget('admin');
    return view('articles.loginAdmin');
}

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    // Affiche le formulaire
    public function index()
    {
        return view('contact.index');
    }

    // Traite l'envoi du formulaire
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:255',
            'email' => 'required|email',
            'message' => 'required|string',
        ]);

        // Ici tu peux envoyer un mail ou stocker le message
        // Exemple : Mail::to('admin@site.com')->send(new ContactMail($request->all()));

        return redirect()->route('contact.index')->with('success', 'Votre message a été envoyé !');
    }
}

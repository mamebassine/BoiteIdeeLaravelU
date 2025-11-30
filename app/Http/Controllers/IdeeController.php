<?php

namespace App\Http\Controllers;

use App\Models\Idee;
use App\Models\Categorie;
use Illuminate\Http\Request;

class IdeeController extends Controller
{
    // Affiche toutes les idées
    public function index()
    {
        $idees = Idee::latest()->paginate(10);
        return view('idees.index', compact('idees'));
    }

    // Formulaire pour créer une nouvelle idée
    public function create()
    {
        $categories = Categorie::all();
        return view('idees.create', compact('categories'));
    }

    // Enregistrer une nouvelle idée
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:255',
            'auteur_email' => 'required|email',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        Idee::create($request->all());

        return redirect()->route('idees.index')->with('success', 'Idée créée avec succès !');
    }

    // Affiche une idée spécifique
    // public function show(Idee $idee)
    // {
    //     return view('idees.show', compact('idee'));
    // }

    public function show($id)
{
    $idee = Idee::with('commentaires')->findOrFail($id);

    return view('idees.show', compact('idee'));
}


    // Formulaire pour éditer une idée
    public function edit(Idee $idee)
    {
        $categories = Categorie::all();
        return view('idees.edit', compact('idee', 'categories'));
    }

    // Mettre à jour une idée
    public function update(Request $request, Idee $idee)
    {
        $request->validate([
            'libelle' => 'required|string|max:255',
            'description' => 'required|string',
            'auteur_nom_complet' => 'required|string|max:255',
            'auteur_email' => 'required|email',
            'categorie_id' => 'required|exists:categories,id',
        ]);

        $idee->update($request->all());

        return redirect()->route('idees.index')->with('success', 'Idée mise à jour avec succès !');
    }

    // Supprimer une idée
    public function destroy(Idee $idee)
    {
        $idee->delete();
        return redirect()->route('idees.index')->with('success', 'Idée supprimée avec succès !');
    }
}

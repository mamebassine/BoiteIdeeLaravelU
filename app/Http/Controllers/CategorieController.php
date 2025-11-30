<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    // Affichage + formulaire
    public function index()
    {
        $categories = Categorie::orderBy('libelle')->get();
        return view('categories.index', compact('categories'));
    }

    // Ajouter
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        Categorie::create([
            'libelle' => $request->libelle
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée');
    }

    // Modifier
    public function update(Request $request, $id)
    {
        $request->validate([
            'libelle' => 'required|string|max:255'
        ]);

        $categorie = Categorie::findOrFail($id);
        $categorie->update([
            'libelle' => $request->libelle
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie modifiée');
    }

    // Supprimer
    public function destroy($id)
    {
        Categorie::findOrFail($id)->delete();

        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée');
    }
}

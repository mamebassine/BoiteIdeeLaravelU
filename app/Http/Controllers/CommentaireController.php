<?php

namespace App\Http\Controllers;

use App\Models\Commentaire;
use App\Models\Idee;
use Illuminate\Http\Request;

class CommentaireController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'libelle' => 'required',
            'nom_complet_auteur' => 'required',
            'idee_id' => 'required|exists:idees,id',
        ]);

        Commentaire::create($request->all());

        return back()->with('success', 'Commentaire ajouté avec succès.');
    }

    public function edit(Commentaire $commentaire)
    {
        return view('commentaires.edit', compact('commentaire'));
    }

    public function update(Request $request, Commentaire $commentaire)
    {
        $request->validate([
            'libelle' => 'required',
            'nom_complet_auteur' => 'required'
        ]);

        $commentaire->update($request->all());

        return redirect()->route('idees.show', $commentaire->idee_id)
                         ->with('success', 'Commentaire modifié.');
    }

    public function destroy(Commentaire $commentaire)
    {
        $idIdee = $commentaire->idee_id;
        $commentaire->delete();

        return redirect()->route('idees.show', $idIdee)
                         ->with('success', 'Commentaire supprimé.');
    }
}

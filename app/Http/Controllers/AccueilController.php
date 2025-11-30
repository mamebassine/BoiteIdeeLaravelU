<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Idee;

class AccueilController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        $idees = Idee::latest()->take(6)->get();
        return view('accueil', compact('categories', 'idees'));
    }
}

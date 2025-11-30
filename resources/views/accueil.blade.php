@extends('layouts.public')

@section('title', 'Accueil')

@section('content')
<link rel="stylesheet" href="{{ asset('css/accueil.blade.css') }}">

<div class="container mt-5 text-center">

    <!-- SECTION AVEC BACKGROUND -->
    <div class="hero-section">
        <h1 class="fw-bold mb-3">Bienvenue dans la Boîte à Idées 💡</h1>
        <p class="lead mb-4">Partagez vos idées et découvrez celles des autres.</p>
        <a href="{{ route('idees.create') }}" class="btn btn-success btn-lg mb-5">Soumettre une idée</a>
    </div>

    <h2 class="mb-4">Catégories</h2>
    <div class="row">
        @foreach($categories as $categorie)
            <div class="col-md-4 mb-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $categorie->libelle }}</h5>
                        <p class="card-text">{{ $categorie->idees()->count() }} idées</p>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

   <h2 class="my-4">Idées récentes</h2>
<div class="row">
    @foreach($idees as $idee)
        <div class="col-md-4 mb-3">
            <a href="{{ route('idees.show', $idee) }}" style="text-decoration: none; color: inherit;">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">{{ $idee->libelle }}</h5>
                        <p class="card-text">{{ Str::limit($idee->description, 100) }}</p>
                    </div>
                </div>
            </a>
        </div>
    @endforeach
</div>


</div>
@endsection

@extends('layouts.public')

@section('content')
<div class="container">
    <h1>Modifier l'idée</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('idees.update', $idee) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label>Libellé</label>
            <input type="text" name="libelle" class="form-control" value="{{ old('libelle', $idee->libelle) }}">
        </div>
        <div class="mb-3">
            <label>Description</label>
            <textarea name="description" class="form-control">{{ old('description', $idee->description) }}</textarea>
        </div>
        <div class="mb-3">
            <label>Auteur</label>
            <input type="text" name="auteur_nom_complet" class="form-control" value="{{ old('auteur_nom_complet', $idee->auteur_nom_complet) }}">
        </div>
        <div class="mb-3">
            <label>Email de l'auteur</label>
            <input type="email" name="auteur_email" class="form-control" value="{{ old('auteur_email', $idee->auteur_email) }}">
        </div>
        <div class="mb-3">
            <label>Catégorie</label>
            <select name="categorie_id" class="form-control">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" @if($idee->categorie_id == $categorie->id) selected @endif>{{ $categorie->libelle }}</option>
                @endforeach
            </select>
        </div>
        <button class="btn btn-primary">Mettre à jour</button>
    </form>
</div>
@endsection

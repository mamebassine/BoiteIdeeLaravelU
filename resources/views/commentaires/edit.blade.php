@extends('layouts.public')

@section('content')
<div class="container my-5">

    <h2 class="mb-4">Modifier le commentaire</h2>

    <form action="{{ route('commentaires.update', $commentaire->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Commentaire</label>
            <textarea name="libelle" class="form-control" required>{{ $commentaire->libelle }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Nom de l’auteur</label>
            <input type="text" name="nom_complet_auteur" class="form-control"
                   value="{{ $commentaire->nom_complet_auteur }}" required>
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ url()->previous() }}" class="btn btn-secondary">Annuler</a>
    </form>

</div>
@endsection

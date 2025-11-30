@extends('layouts.public') 

@section('content')
<style>
    :root {
        --primary: #6DA86E;
        --primary-dark: #578f57;
        --accent: #FF6B6B;
    }

    body {
        font-family: Arial, sans-serif;
        background-color: #F0FDF9;
        color: #333;
        margin: 0;
        padding: 0;
    }

    .container {
        max-width: 900px;
        margin: 40px auto;
        padding: 0 15px;
    }

    /* Card idée */
    .card {
        background-color: #fff;
        border-radius: 15px;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        padding: 20px 25px;
        margin-bottom: 30px;
    }

    h1 {
        font-size: 28px;
        font-weight: bold;
        margin-bottom: 15px;
        color: var(--primary-dark);
    }

    p {
        line-height: 1.5;
        margin-bottom: 10px;
    }

    .description {
        background-color: #F0FDF9;
        border-left: 5px solid var(--primary);
        border-radius: 8px;
        padding: 15px;
    }

    .badge {
        display: inline-block;
        padding: 5px 12px;
        font-size: 14px;
        font-weight: bold;
        color: #fff;
        border-radius: 12px;
    }

    /* Boutons */
    .btn {
        display: inline-block;
        padding: 10px 20px;
        border: none;
        border-radius: 12px;
        font-size: 14px;
        font-weight: bold;
        text-decoration: none;
        cursor: pointer;
        transition: background-color 0.3s;
        color: #fff;
        margin-right: 10px;
    }

    .btn-modifier {
        background-color: #009975;
    }

    .btn-modifier:hover {
        background-color: #007A5C;
    }

    .btn-retour {
        background-color: var(--accent);
    }

    .btn-retour:hover {
        background-color: #e65555;
    }

    /* Commentaires */
    .comment-card {
        background-color: #fff;
        border-radius: 12px;
        padding: 15px;
        box-shadow: 0 2px 6px rgba(0,0,0,0.1);
        margin-bottom: 15px;
    }

    .comment-card small {
        color: #777;
    }

    .comment-card a,
    .comment-card button {
        display: inline-block;
        margin-top: 10px;
        padding: 6px 12px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: bold;
        text-decoration: none;
        border: none;
        cursor: pointer;
        transition: 0.3s;
        color: #fff;
    }

    .btn-warning {
        background-color: #FFC107;
    }

    .btn-warning:hover {
        background-color: #e0a800;
    }

    .btn-danger {
        background-color: #FF6B6B;
    }

    .btn-danger:hover {
        background-color: #e65555;
    }

    hr {
        border: none;
        border-top: 1px solid #ccc;
        margin: 40px 0;
    }

    /* Formulaire ajout commentaire */
    form input[type="text"],
    form textarea {
        width: 100%;
        padding: 12px 15px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 10px;
        font-size: 14px;
        box-sizing: border-box;
    }

    form button {
        background-color: var(--primary);
        padding: 12px 20px;
        border-radius: 12px;
        font-weight: bold;
        border: none;
        color: #fff;
        font-size: 15px;
        cursor: pointer;
        transition: 0.3s;
    }

    form button:hover {
        background-color: var(--primary-dark);
    }

    /* Texte "Aucun commentaire" */
    .text-muted {
        color: #777;
        font-style: italic;
    }
</style>

<div class="container">

    <!-- Card idée -->
    <div class="card">
        <h1>{{ $idee->libelle }}</h1>
        
        <p><strong>Description:</strong></p>
        <p class="description">
            {{ $idee->description }}
        </p>

        <p><strong>Auteur:</strong> 
            <span style="color: var(--primary-dark); font-weight: 500;">
                {{ $idee->auteur_nom_complet }}
            </span> 
            (<span style="color: var(--accent);">{{ $idee->auteur_email }}</span>)
        </p>

        <p><strong>Catégorie:</strong> 
            <span class="badge" style="background-color: var(--primary);">
                {{ $idee->categorie->libelle }}
            </span>
        </p>

        <!-- Boutons -->
        <div style="margin-top:20px;">
            <a href="{{ route('idees.edit', $idee) }}" class="btn btn-modifier">Modifier</a>
            <a href="{{ route('idees.index') }}" class="btn btn-retour">Retour</a>
        </div>
    </div>


    <!-- Commentaires -->
    <hr>

    <h3>Commentaires</h3>

    @forelse ($idee->commentaires as $commentaire)
        <div class="comment-card">
            <p>{{ $commentaire->libelle }}</p>
            <small>Auteur : {{ $commentaire->nom_complet_auteur }}</small>

            <div>
                <a href="{{ route('commentaires.edit', $commentaire->id) }}" class="btn btn-warning">Modifier</a>

                <form action="{{ route('commentaires.destroy', $commentaire->id) }}" 
                      method="POST" 
                      style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Supprimer ?')">Supprimer</button>
                </form>
            </div>
        </div>
    @empty
        <p class="text-muted">Aucun commentaire pour cette idée.</p>
    @endforelse


    <hr>

    <h3>Ajouter un commentaire</h3>

    <form action="{{ route('commentaires.store') }}" method="POST">
        @csrf

        <input type="hidden" name="idee_id" value="{{ $idee->id }}">

        <div>
            <label>Commentaire</label>
            <textarea name="libelle" required></textarea>
        </div>

        <div>
            <label>Votre nom</label>
            <input type="text" name="nom_complet_auteur" required>
        </div>

        <button type="submit">Publier</button>
    </form>

</div>
@endsection

@extends('layouts.admin')

@section('content')

<style>
    :root {
        --text: #000;
        --muted: #6F6F6F;
        --accent: #FF6B6B;
        --primary: #00B894;
        --primary-dark: #009975;
    }

    .container { margin-top: 40px; max-width: 600px; }

    h1 {
        text-align: center;
        font-weight: bold;
        margin-bottom: 25px;
        color: var(--text);
    }

    form {
        background: #fff;
        padding: 20px;
        border: 1px solid #ddd;
        border-radius: 0;
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    }

    label {
        font-weight: 600;
        margin-top: 10px;
    }

    select, input {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border-radius: 0; /* bords droits */
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .btn-success {
        background-color: var(--accent) !important;
        border: none !important;
        padding: 10px 20px;
        font-weight: 600;
        color: #fff;
        cursor: pointer;
        transition: 0.3s;
        border-radius: 0; /* bords droits */
    }
    .btn-success:hover { background-color: var(--primary-dark) !important; }

    .btn-secondary {
        background-color: #6F6F6F;
        color: #fff;
        padding: 10px 20px;
        border: none;
        border-radius: 0;
        font-weight: 500;
        cursor: pointer;
        transition: 0.3s;
    }
    .btn-secondary:hover { background-color: #555; }

</style>

<div class="container">

    <h1>Modifier le statut</h1>

<form action="{{ route('idees.updateStatut', $idee->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Libellé</label>
        <input type="text" value="{{ $idee->libelle }}" disabled>

        <label>Auteur</label>
        <input type="text" value="{{ $idee->auteur_nom_complet }}" disabled>

        <label>Email</label>
        <input type="text" value="{{ $idee->auteur_email }}" disabled>

        <label>Description</label>
        <textarea rows="4" disabled>{{ $idee->description }}</textarea>

        <label>Catégorie</label>
        <input type="text" value="{{ $idee->categorie->libelle }}" disabled>

        <label>Statut</label>
        <select name="statut" required>
            <option value="en_attente" {{ $idee->statut == 'en_attente' ? 'selected' : '' }}>En attente</option>
            <option value="approuvée" {{ $idee->statut == 'approuvée' ? 'selected' : '' }}>Approuvée</option>
            <option value="refusée" {{ $idee->statut == 'refusée' ? 'selected' : '' }}>Refusée</option>
        </select>

        <div style="display: flex; gap: 10px;">
            <button type="submit" class="btn-success">Enregistrer</button>
            <a href="{{ route('idees.index') }}" class="btn-secondary">Annuler</a>
        </div>

    </form>

</div>

@endsection

@extends('layouts.public')

@section('content')

<style>
    :root {
        --text: #000;
        --muted: #6F6F6F;
        --accent: #FF6B6B;
        --primary: #00B894;
        --primary-dark: #009975;
    }

    .container {
        max-width: 480px;
        margin: 40px auto;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        border: 1px solid #eaeaea;
    }

    h1 {
        text-align: center;
        font-size: 20px;
        color: var(--primary-dark);
        margin-bottom: 20px;
        font-weight: bold;
    }

    label {
        font-size: 14px;
        font-weight: bold;
        color: var(--primary-dark);
        margin-bottom: 5px;
        display: block;
    }

    input, textarea, select {
        width: 100%;
        padding: 8px 10px;
        border: 1px solid #ccc;
        border-radius: 6px;
        margin-bottom: 15px;
        font-size: 14px;
    }

    textarea {
        min-height: 100px;
    }

    button {
        width: 100%;
        background: var(--accent);
        border: none;
        padding: 10px;
        color: #fff;
        font-size: 15px;
        border-radius: 6px;
        cursor: pointer;
        font-weight: bold;
    }

    button:hover {
        background: #e05555;
    }
</style>


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

        <label>Libellé</label>
        <input type="text" name="libelle" value="{{ old('libelle', $idee->libelle) }}">

        <label>Description</label>
        <textarea name="description">{{ old('description', $idee->description) }}</textarea>

        <label>Auteur</label>
        <input type="text" name="auteur_nom_complet" value="{{ old('auteur_nom_complet', $idee->auteur_nom_complet) }}">

        <label>Email de l'auteur</label>
        <input type="email" name="auteur_email" value="{{ old('auteur_email', $idee->auteur_email) }}">

        <label>Catégorie</label>
        <select name="categorie_id">
            @foreach($categories as $categorie)
                <option value="{{ $categorie->id }}" @if($idee->categorie_id == $categorie->id) selected @endif>
                    {{ $categorie->libelle }}
                </option>
            @endforeach
        </select>

        <button>Mettre à jour</button>
    </form>
</div>

@endsection

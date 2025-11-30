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

/* Conteneur principal */
.form-container {
    max-width: 700px;
    margin: 40px auto;
    background: #fff;
    padding: 30px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
}

/* Titre */
.form-container h1 {
    text-align: center;
    margin-bottom: 25px;
    color: var(--primary-dark);
    font-weight: bold;
}

/* Erreurs */
.alert {
    background: var(--accent);
    color: white;
    padding: 12px;
    border-radius: 8px;
    margin-bottom: 20px;
}
.alert ul { margin: 0; padding-left: 20px; }

/* Champs */
.form-group {
    margin-bottom: 18px;
}

label {
    font-weight: 600;
    color: var(--text);
    display: block;
    margin-bottom: 6px;
}

input, textarea, select {
    width: 100%;
    padding: 12px;
    border-radius: 8px;
    border: 1px solid #ccc;
    color: var(--text);
    font-size: 15px;
    background: #fafafa;
    transition: 0.2s ease;
}

input:focus, textarea:focus, select:focus {
    border-color: var(--primary);
    box-shadow: 0 0 4px rgba(0,184,148,0.4);
}

/* Deux colonnes */
.form-row {
    display: flex;
    gap: 15px;
}
.form-group.half {
    flex: 1;
}

/* Boutons */
.form-buttons {
    display: flex;
    justify-content: center;
    gap: 15px;
    margin-top: 25px;
}

.btn-primary {
    background: var(--primary);
    border: none;
    padding: 12px 25px;
    color: white;
    font-weight: bold;
    border-radius: 8px;
    cursor: pointer;
    transition: 0.2s;
}
.btn-primary:hover {
    background: var(--primary-dark);
}

.btn-secondary {
    background: var(--accent);
    padding: 12px 25px;
    color: white !important;
    font-weight: bold;
    border-radius: 8px;
    text-decoration: none;
    transition: 0.2s;
}
.btn-secondary:hover {
    opacity: 0.85;
}

/* Responsive */
@media (max-width: 768px) {
    .form-row {
        flex-direction: column;
    }
}
</style>

<div class="form-container">
    <h1>💡 Proposer une nouvelle idée</h1>

    {{-- Affichage des erreurs --}}
    @if ($errors->any())
        <div class="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('idees.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="libelle">Libellé de l'idée</label>
            <input type="text" id="libelle" name="libelle" value="{{ old('libelle') }}" placeholder="Ex: Amélioration du service public">
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" rows="4" placeholder="Décrivez votre idée...">{{ old('description') }}</textarea>
        </div>

        <div class="form-row">
            <div class="form-group half">
                <label for="auteur_nom_complet">Nom complet</label>
                <input type="text" id="auteur_nom_complet" name="auteur_nom_complet" value="{{ old('auteur_nom_complet') }}" placeholder="Ex: Demba DIACK">
            </div>

            <div class="form-group half">
                <label for="auteur_email">Email</label>
                <input type="email" id="auteur_email" name="auteur_email" value="{{ old('auteur_email') }}" placeholder="dembadiack@mail.com">
            </div>
        </div>

        <div class="form-group">
            <label for="categorie_id">Catégorie</label>
            <select id="categorie_id" name="categorie_id">
                <option value="">-- Sélectionnez une catégorie --</option>
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->id }}" {{ old('categorie_id') == $categorie->id ? 'selected' : '' }}>
                        {{ $categorie->libelle }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-buttons">
            <button type="submit" class="btn-primary">Enregistrer</button>
            <a href="{{ route('idees.index') }}" class="btn-secondary">Annuler</a>
        </div>
    </form>
</div>
@endsection

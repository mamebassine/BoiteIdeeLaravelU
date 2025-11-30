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

/* Conteneur */
.container {
    max-width: 900px;
    margin: 40px auto;
    padding: 0 15px;
}

/* Titres */
.title {
    text-align: center;
    color: var(--primary-dark);
    margin-bottom: 25px;
    font-weight: bold;
}

h4 {
    color: var(--primary);
    margin-bottom: 15px;
}

/* Messages succès */
.alert-success {
    background: var(--primary);
    color: white;
    padding: 10px 15px;
    border-radius: 6px;
    margin-bottom: 20px;
}

/* Carte d'ajout */
.card {
    background: #fff;
    padding: 20px;
    border-radius: 12px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    margin-bottom: 30px;
}

.card input[type="text"] {
    width: 100%;
    padding: 10px 12px;
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 14px;
    margin-bottom: 12px;
    color: var(--text);
}

/* Boutons */
.btn-add, .btn-modify, .btn-delete {
    padding: 8px 16px;
    font-weight: bold;
    border-radius: 6px;
    border: none;
    cursor: pointer;
    font-size: 14px;
    transition: 0.2s;
}

.btn-add {
    background: var(--primary);
    color: white;
}
.btn-add:hover {
    background: var(--primary-dark);
}

.btn-modify {
    background: var(--accent);
    color: white;
}
.btn-modify:hover {
    opacity: 0.85;
}

.btn-delete {
    background: #d63031;
    color: white;
}
.btn-delete:hover {
    opacity: 0.85;
}

/* Tableau catégories */
.table-categories {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    border: 1px solid #ddd;
    margin-top: 15px;
}

.table-categories th, .table-categories td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: left;
    font-size: 14px;
    color: var(--text);
}

.table-categories thead tr {
    background-color: var(--primary-dark);
    color: white;
    font-weight: bold;
}

.table-categories tbody tr:hover {
    background-color: #f7f7f7;
}

/* Formulaire inline pour modifier */
.form-inline {
    display: flex;
    align-items: center;
    gap: 10px;
}

.form-inline input[type="text"] {
    flex: 1;
}

/* Responsive */
@media (max-width: 768px) {
    .form-inline {
        flex-direction: column;
        align-items: stretch;
    }
    .form-inline button {
        width: 100%;
    }
}
</style>

<div class="container">

    <h2 class="title">Gestion des Catégories</h2>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    {{-- Formulaire d’ajout --}}
    <div class="card">
        <h4>Ajouter une catégorie</h4>

        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Libellé</label>
                <input type="text" name="libelle" required>
            </div>
            <button type="submit" class="btn-add">Ajouter</button>
        </form>
    </div>

    <hr>

    {{-- Tableau des catégories --}}
    <h4>Liste des catégories</h4>

    <table class="table-categories">
        <thead>
            <tr>
                <th>#</th>
                <th>Libellé</th>
                <!-- <th>Modifier</th>
                <th>Supprimer</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $index => $categorie)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>
                    <form action="{{ route('categories.update', $categorie->id) }}" method="POST" class="form-inline">
                        @csrf
                        @method('PUT')
                        <input type="text" name="libelle" value="{{ $categorie->libelle }}">
                </td>
                <!-- <td>
                        <button type="submit" class="btn-modify">Modifier</button>
                    </form>
                </td>
                <td>
                    <form action="{{ route('categories.destroy', $categorie->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn-delete" onclick="return confirm('Supprimer ?')">Supprimer</button> -->
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection

@extends('layouts.public')

@section('content')

<style>
    :root {
        --text: #000;
        --muted: #6F6F6F;
        --accent: #FF6B6B;
        --text: #000;
  --primary: #00B894;        
  --primary-dark: #009975;   
   
    }

    /* Conteneur */
    .container {
        margin-top: 40px;
    }

    /* Titre */
    h1 {
        text-align: center;
        font-weight: bold;
        color: var(--text);
        margin-bottom: 25px;
    }

    /* Bouton nouvelle idée */
    .btn-success {
        background-color: var(--accent) !important;
        border: none !important;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 30px;
        color: #fff;
    }
    .btn-success:hover {
        background-color: #009975 !important;
    }

    /* Tableau simple et neutre */
    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
        border: 1px solid #ccc;
    }

    thead tr {
        background-color: #f3d1d1ff;
        color: white;
        font-weight: bold;
    }

    th, td {
        padding: 12px;
        border: 1px solid #ddd;
        font-size: 14px;
        color: var(--text);
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    /* Boutons actions — couleurs sobres */
    .btn-info {
        background: #6F6F6F !important;
        border: none !important;
        margin-right: 5px !important;
    }
    .btn-info:hover {
        background: #e4cdcdff !important;
    }

    .btn-warning {
        background: var(--accent) !important;
        border: none !important;
        margin-right: 5px !important;
    }
    .btn-warning:hover {
        background: #e05555 !important;
    }

    .btn-danger {
        background: #d63031 !important;
        border: none !important;
        margin-top: 5px;
    }
    .btn-danger:hover {
        opacity: 0.85;
    }

    /* Espace entre les boutons */
    td .btn {
        margin-bottom: 5px !important;
        display: inline-block;
    }
</style>


<div class="container">
    <h1>Liste des idées</h1>

    <a href="{{ route('idees.create') }}" class="btn btn-success mb-3">Nouvelle idée</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Auteur</th>
                <th>Catégorie</th>
                <!-- <th>Actions</th> -->
            </tr>
        </thead>
        <tbody>
            @foreach($idees as $idee)
            <tr>
                <td>{{ $idee->libelle }}</td>
                <td>{{ $idee->auteur_nom_complet }}</td>
                <td>{{ $idee->categorie->libelle }}</td>
                <!-- <td> -->
                    <!-- <a href="{{ route('idees.show', $idee) }}" class="btn btn-info btn-sm">Voir</a>
                    <a href="{{ route('idees.edit', $idee) }}" class="btn btn-warning btn-sm">Modifier</a>

                    <form action="{{ route('idees.destroy', $idee) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer cette idée ?')">
                            Supprimer
                        </button> -->
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $idees->links() }}
</div>

@endsection

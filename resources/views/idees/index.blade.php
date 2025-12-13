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
        margin-top: 40px;
    }

    h1 {
        text-align: center;
        font-weight: bold;
        color: var(--text);
        margin-bottom: 25px;
    }

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
        vertical-align: top;
    }

    tbody tr:hover {
        background-color: #f1f1f1;
    }

    .badge {
        padding: 6px 12px;
        border-radius: 12px;
        font-size: 13px;
        font-weight: bold;
        color: #fff;
    }

    .bg-wait { background-color: #6c757d; }
    .bg-yes { background-color: #28a745; }
    .bg-no { background-color: #dc3545; }

    .toggle-btn {
        color: var(--accent);
        cursor: pointer;
        font-size: 13px;
        font-weight: bold;
        display: inline-block;
        margin-top: 5px;
    }
</style>


<div class="container">
    <h1>Liste des idées site</h1>

    <a href="{{ route('idees.create') }}" class="btn btn-success mb-3">Nouvelle idée</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Auteur</th>
                <th>Email</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Statut</th>
            </tr>
        </thead>

        <tbody>
            @foreach($idees as $idee)
            <tr>
                <td>{{ $idee->libelle }}</td>
                <td>{{ $idee->auteur_nom_complet }}</td>

                <!-- Email -->
                <td>{{ $idee->auteur_email }}</td>

                <!-- Description avec Voir plus / Voir moins -->
                <td>
                    <span class="desc-short">{{ Str::limit($idee->description, 50) }}</span>

                    <span class="desc-full" style="display:none;">
                        {{ $idee->description }}
                    </span>

                    <span class="toggle-btn" onclick="toggleDescription(this)">
                        Voir plus
                    </span>
                </td>

                <!-- Catégorie -->
                <td>{{ $idee->categorie->libelle }}</td>

                <!-- Statut -->
                <td>
                    @if($idee->statut == 'en_attente')
                        <span class="badge bg-wait">En attente</span>
                    @elseif($idee->statut == 'approuvée')
                        <span class="badge bg-yes">Approuvée</span>
                    @elseif($idee->statut == 'refusée')
                        <span class="badge bg-no">Refusée</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    {{ $idees->links() }}
</div>


<!-- Script Voir plus / Voir moins -->
<script>
function toggleDescription(btn) {
    let shortText = btn.parentElement.querySelector('.desc-short');
    let fullText = btn.parentElement.querySelector('.desc-full');

    if (fullText.style.display === "none") {
        fullText.style.display = "inline";
        shortText.style.display = "none";
        btn.textContent = "Voir moins";
    } else {
        fullText.style.display = "none";
        shortText.style.display = "inline";
        btn.textContent = "Voir plus";
    }
}
</script>

@endsection

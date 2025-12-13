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

    .container { margin-top: 40px; }

    h1 {
        text-align: center;
        font-weight: bold;
        margin-bottom: 25px;
        color: var(--text);
    }

    /* Bouton principal */
    .btn-success {
        background-color: var(--accent) !important;
        border: none !important;
        padding: 10px 20px;
        font-weight: 600;
        border-radius: 0; /* bords droits */
        color: #fff;
        transition: 0.3s;
    }
    .btn-success:hover { background-color: var(--primary-dark) !important; }

    /* Table */
    table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        border: 1px solid #ddd;
    }
    thead tr { background-color: #ffcece; color: var(--text); }
    th, td { padding: 12px; border: 1px solid #eee; font-size: 14px; }
    .badge { padding: 4px 8px; border-radius: 6px; color: #fff; font-size: 12px; }
    .bg-success { background: var(--primary); }
    .bg-danger { background: var(--accent); }
    .bg-secondary { background: #6F6F6F; }

    /* Boutons action */
    .action-buttons {
        display: flex;
        gap: 5px;
        flex-wrap: nowrap;
        align-items: center;
    }
    .action-buttons .btn {
        padding: 6px 12px;
        font-size: 13px;
        font-weight: 500;
        cursor: pointer;
        text-align: center;
        transition: all 0.3s ease;
        box-shadow: 0 2px 4px rgba(0,0,0,0.15);
        border: none;
        color: #fff;
        border-radius: 0; /* bords droits */
    }

    .btn-warning { background-color: var(--accent); }
    .btn-warning:hover { background-color: #e05555; transform: translateY(-2px); box-shadow: 0 4px 6px rgba(0,0,0,0.2); }

    .btn-danger { background-color: #d63031; }
    .btn-danger:hover { background-color: #c12b28; transform: translateY(-2px); box-shadow: 0 4px 6px rgba(0,0,0,0.2); }

    .btn-info { background-color: var(--primary); }
    .btn-info:hover { background-color: var(--primary-dark); transform: translateY(-2px); box-shadow: 0 4px 6px rgba(0,0,0,0.2); }

    /* Modal */
    .modal {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.4);
        z-index: 1000;
        padding-top: 100px;
    }
    .modal-content {
        background: #fff;
        margin: auto;
        padding: 20px;
        width: 40%;
        border-radius: 10px;
    }
    .close {
        float: right;
        font-size: 22px;
        font-weight: bold;
        color: var(--muted);
        cursor: pointer;
    }
    .close:hover { color: var(--text); }


    .see-more {
    font-size: 15px;
    color: var(--accent);
    text-decoration: none;
    cursor: pointer;
    transition: color 0.2s;
}

.see-more:hover {
    color: var(--primary-dark);
}

</style>

<div class="container">

    <h1>Liste des idées (Admin)</h1>

    <a href="{{ route('idees.create') }}" class="btn btn-success mb-3">Nouvelle idée</a>

    <table class="table">
        <thead>
            <tr>
                <th>Libellé</th>
                <th>Auteur</th>
                <th>Email</th>
                <th>Description</th>
                <th>Catégorie</th>
                <th>Statut</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
            @foreach($idees as $idee)
            <tr>
                <td>{{ $idee->libelle }}</td>
                <td>{{ $idee->auteur_nom_complet }}</td>
                <td>{{ $idee->auteur_email }}</td>

<td>
    {{ Str::limit($idee->description, 50) }}
    <span class="see-more" onclick="openModal({{ $idee->id }})">Voir plus</span>
</td>


                <td>{{ $idee->categorie->libelle }}</td>

                <td>
                    @if($idee->statut == 'en_attente') <span class="badge bg-secondary">En attente</span>
                    @elseif($idee->statut == 'approuvée') <span class="badge bg-success">Approuvée</span>
                    @else <span class="badge bg-danger">Refusée</span> @endif
                </td>

                <td>
                    <div class="action-buttons">
        <a href="{{ route('idees.modifierAdmin', $idee->id) }}" class="btn btn-warning btn-sm">Modifier</a>

                        <form action="{{ route('idees.destroy', $idee) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="return confirm('Supprimer ?')">Supprimer</button>
                        </form>
                    </div>
                </td>
            </tr>

            <!-- MODAL -->
            <div id="modal-{{ $idee->id }}" class="modal">
                <div class="modal-content">
                    <span class="close" onclick="closeModal({{ $idee->id }})">&times;</span>
                    <h4>{{ $idee->libelle }}</h4>
                    <p>{{ $idee->description }}</p>
                </div>
            </div>

            @endforeach
        </tbody>
    </table>

    {{ $idees->links() }}

</div>

<script>
    function openModal(id) {
        document.getElementById('modal-' + id).style.display = 'block';
    }
    function closeModal(id) {
        document.getElementById('modal-' + id).style.display = 'none';
    }

    window.onclick = function(event) {
        document.querySelectorAll('.modal').forEach(modal => {
            if (event.target === modal) modal.style.display = "none";
        });
    }
</script>

@endsection

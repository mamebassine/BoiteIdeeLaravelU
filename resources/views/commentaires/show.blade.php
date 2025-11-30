<h1>Détail de l'idée</h1>

<h2>{{ $idee->libelle }}</h2>
<p>{{ $idee->description }}</p>
<p>Auteur : <strong>{{ $idee->auteur_nom_complet }}</strong></p>

<hr>

<h3>Commentaires</h3>

@foreach ($idee->commentaires as $commentaire)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <p>{{ $commentaire->libelle }}</p>
        <small>Auteur : {{ $commentaire->nom_complet_auteur }}</small>

        <div>
            <a href="{{ route('commentaires.edit', $commentaire->id) }}">Modifier</a>

            <form action="{{ route('commentaires.destroy', $commentaire->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Supprimer ?')">Supprimer</button>
            </form>
        </div>
    </div>
@endforeach

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

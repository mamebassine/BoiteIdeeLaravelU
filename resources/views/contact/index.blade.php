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

/* Conteneur principal plus compact */
.container {
    max-width: 600px; /* un peu plus étroit */
    margin: 30px auto; /* moins de marge */
    padding: 0 10px;
}

/* Titres */
.title {
    text-align: center;
    color: var(--primary-dark);
    margin-bottom: 20px; /* moins de marge */
    font-weight: bold;
    font-size: 28px;
}

/* Messages succès */
.alert-success {
    background: var(--primary);
    color: white;
    padding: 8px 12px; /* moins grand */
    border-radius: 6px;
    margin-bottom: 15px; /* moins de marge */
    text-align: center;
    font-size: 14px;
}

/* Carte du formulaire plus compacte */
.card {
    background: #fff;
    padding: 20px 15px; /* moins de padding */
    border-radius: 12px;
    box-shadow: 0 3px 8px rgba(0,0,0,0.1);
}

/* Groupes de champs */
.form-group {
    margin-bottom: 15px;
}

.form-group label {
    display: block;
    margin-bottom: 4px;
    font-weight: 600;
    color: var(--text);
    font-size: 14px;
}

.form-group input,
.form-group textarea {
    width: 100%;
    padding: 8px 10px; /* plus compact */
    border-radius: 6px;
    border: 1px solid #ccc;
    font-size: 13px;
    color: var(--text);
    transition: 0.2s;
}

.form-group input:focus,
.form-group textarea:focus {
    border-color: var(--primary);
    outline: none;
    box-shadow: 0 0 4px rgba(0, 184, 148, 0.3);
}

textarea {
    resize: vertical;
    min-height: 100px; /* moins haut */
}

/* Bouton Envoyer plus petit */
.btn-send {
    background: var(--primary);
    color: white;
    padding: 8px 16px;
    font-weight: bold;
    border: none;
    border-radius: 6px;
    cursor: pointer;
    font-size: 14px;
    transition: 0.2s;
}

.btn-send:hover {
    background: var(--primary-dark);
}

/* Responsive */
@media (max-width: 768px) {
    .card {
        padding: 15px 10px;
    }

    .btn-send {
        width: 100%;
        padding: 10px 0;
    }
}
</style>

<div class="container">

    <h2 class="title">Contactez-nous</h2>

    {{-- Message de succès --}}
    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <form action="{{ route('contact.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nom</label>
                <input type="text" name="nom" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" required>
            </div>

            <div class="form-group">
                <label>Message</label>
                <textarea name="message" required></textarea>
            </div>

            <button type="submit" class="btn-send">Envoyer</button>
        </form>
    </div>

</div>

@endsection

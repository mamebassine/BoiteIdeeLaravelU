<link rel="stylesheet" href="{{ asset('css/header.blade.css') }}">

<nav class="navbar">
    <div class="nav-container">

        <!-- Logo -->
<a class="nav-brand" href="{{ route('accueil') }}">
    <img src="{{ asset('images/logoBoiteIdee.png') }}" alt="Logo Boîte à Idées" class="logo">
</a>


        <!-- Bouton mobile -->
        <button class="nav-toggle" id="navToggle">&#9776;</button>

        <!-- Menu -->
        <ul class="nav-menu" id="navMenu">
            <li><a href="{{ route('accueil') }}">Accueil</a></li>
            <li><a href="{{ route('idees.index') }}">Idées</a></li>
            <li><a href="{{ route('categories.index') }}">Catégories</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>

            {{-- Auth --}}
            @guest
                <li><a href="{{ route('login') }}" class="login-btn">Se connecter</a></li>
            @else
                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="logout-btn">Se déconnecter</button>
                    </form>
                </li>
            @endguest
        </ul>
    </div>
</nav>

<script>
document.getElementById('navToggle').onclick = function() {
    document.getElementById('navMenu').classList.toggle('active');
}
</script>

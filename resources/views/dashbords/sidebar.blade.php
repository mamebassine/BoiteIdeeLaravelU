<div class="dashboard-sidebar">
    <div class="sidebar-top">
        <h3>Menu</h3>

        <ul>
            <li><a href="{{ route('accueil') }}">🏠 Accueil</a></li>
            <li><a href="{{ route('idees.afficheAdmin') }}">💡 Idées</a></li>
            <li><a href="{{ route('categories.index') }}">📂 Catégories</a></li>
            <li><a href="{{ route('commentaires.index') }}">💬 Commentaires</a></li>
        </ul>
    </div>

    <div class="sidebar-bottom">
        @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-logout">🔓 Déconnexion</button>
        </form>
        @endauth
    </div>
</div>

<style>
.dashboard-sidebar {
    width: 220px;
    background: #f7f7f7;
    height: 100vh;
    padding: 20px;
    border-right: 2px solid #ddd;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.sidebar-top h3 {
    margin-bottom: 20px;
    font-size: 18px;
    color: #333;
}

.dashboard-sidebar ul {
    padding: 0;
    list-style: none;
}

.dashboard-sidebar ul li {
    margin-bottom: 15px;
}

.dashboard-sidebar ul li a {
    text-decoration: none;
    color: #333;
    padding: 10px 12px;
    display: block;
    border-radius: 6px;
    transition: 0.3s;
}

.dashboard-sidebar ul li a:hover {
    background-color: #009975;
    color: white;
}

.sidebar-bottom {
    /* reste en bas */
}

.btn-logout {
    width: 100%;
    padding: 10px 12px;
    background-color: #ff6b6b;
    color: white;
    border: none;
    border-radius: 6px;
    cursor: pointer;
}

.btn-logout:hover {
    background-color: #e55353;
}
</style>

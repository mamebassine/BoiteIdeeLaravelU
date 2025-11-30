<nav class="dashboard-navbar"> 
    <div class="nav-left">
        <h1 class="nav-logo">Boîte à Idées</h1>
    </div>

    <div class="nav-right">
        <!-- Onglet Recherche -->
        <input type="text" placeholder="Rechercher..." class="nav-search">

        <!-- Notification -->
        <a href="#" class="nav-notif">🔔</a>

        <!-- Utilisateur connecté -->
        @auth
        <div class="user-info">
            <img src="{{ asset('images/user.png') }}" alt="Profil" class="user-img">
            <span class="user-name">{{ Auth::user()->name }}</span>
        </div>
        @else
        <div class="user-info">
            <span class="user-name">Invité</span>
        </div>
        @endauth
    </div>
</nav>


<style>
.dashboard-navbar {
    width: 100%;
    background: #009975;
    color: white;
    padding: 12px 25px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.nav-logo {
    margin: 0;
    font-size: 22px;
    font-weight: bold;
}

.nav-right {
    display: flex;
    align-items: center;
    gap: 15px;
}

.nav-search {
    padding: 5px 10px;
    border-radius: 5px;
    border: none;
    outline: none;
}

.nav-notif {
    font-size: 20px;
    text-decoration: none;
    color: white;
}

.user-info {
    display: flex;
    align-items: center;
    gap: 8px;
}

.user-img {
    width: 35px;
    height: 35px;
    border-radius: 50%;
    object-fit: cover;
}

.user-name {
    font-weight: bold;
}
</style>

<nav class="bg-white border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-between h-16 items-center">
        <div class="flex items-center">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold text-gray-800">Boîte à Idées</a>
        </div>

        <div class="flex items-center space-x-4">
            @auth
                <span>{{ Auth::user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="px-3 py-1 bg-red-600 text-white rounded">Déconnexion</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-blue-600 font-medium">Se connecter</a>
            @endauth
        </div>
    </div>
</nav>

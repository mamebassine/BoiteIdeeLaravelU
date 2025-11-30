<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
</head>
<body>

{{-- Navbar du dashboard --}}
@include('dashbords.navbar')

<div style="display:flex; min-height: 100vh;">

    {{-- Sidebar du dashboard --}}
    @include('dashbords.sidebar')

    {{-- Contenu du dashboard --}}
    <div style="flex:1; padding:20px;">
        @yield('content')
    </div>
</div>

</body>
</html>

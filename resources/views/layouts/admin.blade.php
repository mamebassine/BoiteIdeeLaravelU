<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin')</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    {{-- CSS optionnel --}}
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">

    @yield('styles')
</head>

<body>

   {{-- NAVBAR DASHBOARD --}}
    @include('dashbords.navbar')

    <div style="display:flex;">
        {{-- SIDEBAR DASHBOARD --}}
        @include('dashbords.sidebar')

        {{-- CONTENU PRINCIPAL --}}
        <div style="flex:1; padding: 20px;">
            @yield('content')
        </div>
    </div>

    {{-- Scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

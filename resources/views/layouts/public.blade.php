<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/header.blade.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.blade.css') }}">
</head>
<body>

{{-- Header du site public --}}
@include('partials.header')

{{-- Contenu de ta page --}}
<div>
    @yield('content')
</div>

{{-- Footer du site public --}}
@include('partials.footer')

</body>
</html>

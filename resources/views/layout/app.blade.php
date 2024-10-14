<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Galeri Virtual Wayang Kamasan | Augmented Reality</title>
    <meta name="description" content="Galeri Virtual Wayang Kamasan | Augmented Reality">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Joti+One&display=swap" rel="stylesheet">
    <!-- Styles -->
    @vite('resources/css/app.css')
    <!-- JS -->
    <script src="{{ asset("assets/js/jquery-3.7.1.min.js") }}"></script>
</head>

@yield('content')

</html>

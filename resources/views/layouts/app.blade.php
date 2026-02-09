<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'ShopLaravel')</title>
   
    <style>
        body { font-family: sans-serif; padding: 20px; }
        nav { background: #333; padding: 10px; margin-bottom: 20px; }
        nav a { color: white; text-decoration: none; margin-right: 15px; }
        footer { margin-top: 50px; font-size: 0.8em; color: gray; }
    </style>
</head>
<body>

    <nav>
        <a href="{{ route('home') }}">Accueil</a>
        <a href="{{ route('products.index') }}">Nos Produits</a>
        <a href="{{ route('about') }}">À Propos</a>
    </nav>

    <main>
        @yield('content')
    </main>

    <footer>
        &copy; {{ date('Y') }} ShopLaravel - Formation Laravel
    </footer>

</body>
</html>
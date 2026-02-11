<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Master Duel Shop')</title>

    {{-- 1. Polices d'écriture : Orbitron (Titres Sci-Fi) et Rajdhani (Texte technique) --}}
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@500;700;900&family=Rajdhani:wght@400;600;700&display=swap" rel="stylesheet">

    <style>
        /* --- VARIABLES MASTER DUEL --- */
        :root {
            --md-bg-dark: #090a11;
            --md-panel: #131722;
            --md-blue: #00d2ff;
            --md-gold: #e8b046;
            --md-text: #ffffff;
            --md-text-muted: #8b9bb4;
            --md-border: #2c3545;
        }

        /* --- RESET --- */
        * { box-sizing: border-box; margin: 0; padding: 0; }

        body {
            font-family: 'Rajdhani', sans-serif;
            background-color: var(--md-bg-dark);
            color: var(--md-text);
            background-image: 
                linear-gradient(rgba(18, 22, 33, 0.9), rgba(18, 22, 33, 0.9)),
                url('https://www.transparenttextures.com/patterns/carbon-fibre.png');
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* --- NAVBAR (HUD STYLE) --- */
        nav {
            background: rgba(19, 23, 34, 0.95);
            border-bottom: 2px solid var(--md-blue);
            padding: 0 40px;
            height: 70px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 0 20px rgba(0, 210, 255, 0.15);
            position: sticky;
            top: 0;
            z-index: 100;
            backdrop-filter: blur(5px);
        }

        /* --- LOGO & MARQUE --- */
        .nav-brand {
            display: flex;           
            align-items: center;     
            gap: 15px;               
            text-decoration: none;   
            height: 100%; /* Assure que le lien prend toute la hauteur */
        }

        .brand-logo {
            height: 70px; /* J'ai mis 45px pour qu'il soit bien visible */
            width: auto;
            object-fit: contain; /* Empêche l'image d'être déformée */
            filter: drop-shadow(0 0 2px rgba(0, 210, 255, 0.5));
            transition: transform 0.3s ease;
        }

        .brand-logo:hover {
            transform: scale(1.1);
            filter: drop-shadow(0 0 5px var(--md-blue));
        }

        .brand-text {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.4rem;       
            font-weight: 900;        
            color: white;
            text-transform: uppercase;
            letter-spacing: 1px;     
            text-shadow: 0 0 10px rgba(0, 210, 255, 0.6); 
            white-space: nowrap; /* Empêche le texte de passer à la ligne */
        }

        /* --- LIENS NAVBAR --- */
        .nav-links {
            display: flex;
            gap: 5px;
            height: 100%;
        }

        .nav-item {
            color: var(--md-text-muted);
            text-decoration: none;
            font-weight: 700;
            text-transform: uppercase;
            padding: 0 20px;
            display: flex;
            align-items: center;
            height: 100%;
            border-bottom: 3px solid transparent;
            transition: all 0.3s ease;
            font-size: 1.1rem;
        }

        .nav-item:hover {
            color: white;
            background: linear-gradient(to top, rgba(0, 210, 255, 0.1), transparent);
            border-bottom-color: var(--md-blue);
            text-shadow: 0 0 8px var(--md-blue);
        }

        /* --- BOUTON ACTIF (CONTACT) --- */
        .btn-craft {
            background: linear-gradient(45deg, #b48529, #f5d67b);
            color: #000;
            padding: 8px 25px;
            border-radius: 2px;
            font-weight: 800;
            margin-left: 20px;
            clip-path: polygon(10% 0, 100% 0, 100% 100%, 0% 100%, 0% 25%);
            transition: transform 0.2s;
            text-decoration: none;
            display: flex;
            align-items: center;
        }
        .btn-craft:hover {
            transform: scale(1.05);
            box-shadow: 0 0 15px rgba(245, 214, 123, 0.6);
            color: #000;
        }

        /* --- MAIN CONTENT --- */
        main {
            flex: 1;
            padding: 40px;
            max-width: 1400px;
            margin: 0 auto;
            width: 100%;
        }

        /* --- TITRES --- */
        h1, h2, .section-title {
            font-family: 'Orbitron', sans-serif;
            color: white;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 30px;
            border-left: 6px solid var(--md-blue);
            padding-left: 20px;
            background: linear-gradient(90deg, rgba(0,210,255,0.1), transparent);
            padding: 10px 0 10px 20px;
        }

        /* --- CARTES & GRID --- */
        .products-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(260px, 1fr));
            gap: 30px;
        }

        .product-card {
            background: var(--md-panel);
            border: 1px solid var(--md-border);
            border-radius: 4px;
            overflow: hidden;
            position: relative;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
        }

        .product-card:hover {
            transform: translateY(-5px) scale(1.02);
            border-color: var(--md-blue);
            box-shadow: 0 0 20px rgba(0, 210, 255, 0.4);
            z-index: 10;
        }

        button, .btn-details {
            font-family: 'Rajdhani', sans-serif;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
        }

        /* --- MESSAGES FLASH --- */
        .alert {
            background: rgba(19, 23, 34, 0.95);
            border-left: 5px solid;
            padding: 20px;
            margin-bottom: 30px;
            display: flex;
            align-items: center;
            font-size: 1.2rem;
            font-weight: bold;
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
            font-family: 'Orbitron', sans-serif;
        }
        .alert-success {
            border-color: #2ecc71;
            color: #2ecc71;
            background: linear-gradient(90deg, rgba(46, 204, 113, 0.1), transparent);
        }
        .alert-error {
            border-color: #e74c3c;
            color: #e74c3c;
            background: linear-gradient(90deg, rgba(231, 76, 60, 0.1), transparent);
        }

        /* --- FOOTER --- */
        footer {
            background: #050608;
            border-top: 1px solid var(--md-border);
            padding: 30px;
            text-align: center;
            color: var(--md-text-muted);
            font-size: 0.9rem;
            margin-top: auto;
        }
    </style>
</head>
<body>

    <nav>
       <a href="{{ route('home') }}" class="nav-brand">
            {{-- 1. L'IMAGE (Logo) --}}
            {{-- Assure-toi que le fichier est bien public/images/logo.png --}}
            <img src="{{ asset('images/logo_ok.png') }}" alt="Logo" class="brand-logo">
            
            {{-- 2. LE TEXTE (À droite) --}}
            <span class="brand-text">Potes of greed ! Shop</span>
        </a>

        <div class="nav-links">
            <a href="{{ route('home') }}" class="nav-item">Accueil</a>
            <a href="{{ route('products.index') }}" class="nav-item">Boutique</a>
            <a href="{{ route('about') }}" class="nav-item">À propos</a>
            {{-- Le bouton Contact (anciennement Créer) --}}
            <a href="{{ route('products.create') }}" class="btn-craft">Contact</a>
        </div>
    </nav>

    <main>
        {{-- Zone de notifications --}}
        @if(session('success'))
            <div class="alert alert-success">
                <span style="margin-right: 15px; font-size: 1.5em;">✔</span> 
                {{ session('success') }}
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-error">
                <span style="margin-right: 15px; font-size: 1.5em;">⚠</span> 
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>

    <footer>
        <p>&copy; {{ date('Y') }} Potes of Greed Shop - Projet Laravel</p>
        <p style="font-size: 0.8em; margin-top: 5px; opacity: 0.6;">Inspiré par l'interface de Yu-Gi-Oh! Master Duel. Fan Project.</p>
    </footer>

</body>
</html>
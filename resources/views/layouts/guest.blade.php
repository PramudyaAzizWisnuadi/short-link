<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600;700&family=Inter:wght@400;500&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        :root {
            --primary: #ef4444;
            --primary-hover: #dc2626;
            --bg: #050a0a;
            --card-bg: rgba(20, 20, 20, 0.8);
            --text-main: #f8fafc;
            --text-dim: #94a3b8;
            --accent: #10b981;
            --gradient: linear-gradient(135deg, #ef4444 0%, #10b981 100%);
        }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            background-image: 
                radial-gradient(circle at 0% 0%, rgba(239, 68, 68, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 100% 100%, rgba(16, 185, 129, 0.1) 0%, transparent 40%);
            color: var(--text-main);
            min-height: 100vh;
        }

        /* Prevent black font globally */
        .text-gray-800, .text-gray-900, .text-black { color: var(--text-main) !important; }
        .text-gray-700, .text-gray-600 { color: var(--text-dim) !important; }

        .guest-container {
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 1.5rem;
        }

        .logo-text {
            font-family: 'Outfit', sans-serif;
            font-size: 2.5rem;
            font-weight: 700;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            margin-bottom: 2rem;
            text-decoration: none;
        }

        .auth-card {
            width: 100%;
            max-width: 450px;
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }

        /* Override Tailwind / Breeze defaults */
        input {
            background-color: rgba(0, 0, 0, 0.4) !important;
            border-color: rgba(255, 255, 255, 0.1) !important;
            color: white !important;
            border-radius: 12px !important;
            padding: 0.75rem 1rem !important;
        }
        input:focus {
            border-color: var(--accent) !important;
            box-shadow: 0 0 0 4px rgba(16, 185, 129, 0.1) !important;
        }
        label { color: var(--text-dim) !important; }
        
        button[type="submit"] {
            background: var(--gradient) !important;
            border: none !important;
            border-radius: 12px !important;
            padding: 0.75rem !important;
            font-weight: 600 !important;
            text-transform: none !important;
            letter-spacing: normal !important;
            box-shadow: 0 10px 15px -3px rgba(239, 68, 68, 0.2) !important;
            width: 100%;
        }
        
        a { color: var(--accent) !important; text-decoration: none; font-size: 0.85rem; }
        a:hover { color: white !important; }

        .checkbox-label { color: var(--text-dim) !important; font-size: 0.85rem; }
    </style>
</head>
<body>
    <div class="guest-container">
        <a href="/" class="logo-text">link.mdgroup.id</a>
        
        <div class="auth-card">
            {{ $slot }}
        </div>
    </div>
</body>
</html>

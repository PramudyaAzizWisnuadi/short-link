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

        .min-h-screen { background-color: transparent !important; }

        header.bg-white { 
            background-color: rgba(255, 255, 255, 0.05) !important; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
            box-shadow: none !important;
        }

        h2.text-gray-800 { color: var(--text-main) !important; }

        .max-w-7xl { max-width: 1200px !important; }

        /* Navigation Overrides */
        nav { 
            background-color: rgba(0, 0, 0, 0.3) !important; 
            border-bottom: 1px solid rgba(255, 255, 255, 0.1) !important;
        }
        
        .dark\:text-gray-400 { color: var(--text-dim) !important; }
        .dark\:hover\:text-gray-300:hover { color: white !important; }
        
        /* Table / Card Overrides */
        .bg-white.dark\:bg-gray-800 {
            background-color: var(--card-bg) !important;
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 20px !important;
        }

        .dark\:border-gray-700 { border-color: rgba(255, 255, 255, 0.05) !important; }
        
        .text-indigo-600 { color: var(--primary) !important; }
        .dark\:text-indigo-400 { color: var(--primary) !important; }
        
        button.bg-gray-200 { 
            background-color: rgba(255, 255, 255, 0.1) !important; 
            color: white !important;
        }
        button.bg-gray-200:hover { background-color: var(--accent) !important; }
    </style>
</head>
<body class="font-sans antialiased">
    <div class="min-h-screen">
        @include('layouts.navigation')

        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>
</body>
</html>

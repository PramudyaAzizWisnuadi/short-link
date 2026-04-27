<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>link.mdgroup.id - Premium URL Shortener</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;600;700&family=Inter:wght@400;500;600&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary: #ef4444; /* Red */
            --primary-hover: #dc2626;
            --bg: #050a0a;
            --card-bg: rgba(20, 20, 20, 0.8);
            --text-main: #f8fafc;
            --text-dim: #94a3b8;
            --accent: #10b981; /* Green */
            --success: #10b981;
            --gradient: linear-gradient(135deg, #ef4444 0%, #10b981 100%);
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background-color: var(--bg);
            background-image: 
                radial-gradient(circle at 0% 0%, rgba(239, 68, 68, 0.1) 0%, transparent 40%),
                radial-gradient(circle at 100% 100%, rgba(16, 185, 129, 0.1) 0%, transparent 40%);
            color: var(--text-main);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header {
            padding: 1rem 2rem;
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.4);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        @media (max-width: 640px) {
            header { padding: 1rem; }
            .logo { font-size: 1.2rem; }
            nav a { margin-left: 0.8rem; font-size: 0.8rem; }
        }

        .logo {
            font-family: 'Outfit', sans-serif;
            font-size: 1.5rem;
            font-weight: 700;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        nav a {
            color: var(--text-dim);
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 500;
            margin-left: 1.5rem;
            transition: color 0.3s;
        }

        nav a:hover { color: white; }

        .btn-outline {
            border: 1px solid rgba(255, 255, 255, 0.1);
            padding: 0.5rem 1rem;
            border-radius: 8px;
        }

        main {
            flex: 1;
            width: 100%;
            max-width: 800px;
            padding: 4rem 2rem;
            display: flex;
            flex-direction: column;
            gap: 3rem;
        }

        .hero { text-align: center; }
        .hero h1 { font-family: 'Outfit', sans-serif; font-size: 3.5rem; font-weight: 700; margin-bottom: 1rem; line-height: 1.1; }
        .hero p { color: var(--text-dim); font-size: 1.1rem; max-width: 500px; margin: 0 auto; }

        .card {
            background: var(--card-bg);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            padding: 2.5rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.7);
        }

        .input-group { display: flex; flex-direction: column; gap: 1.5rem; }
        .form-control { display: flex; flex-direction: column; gap: 0.5rem; }
        .form-control label { font-size: 0.875rem; color: var(--text-dim); }

        input {
            width: 100%; background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px; padding: 1rem 1.25rem; color: white; font-size: 1rem;
        }

        .custom-slug-wrap { display: flex; align-items: center; background: rgba(0, 0, 0, 0.4); border: 1px solid rgba(255, 255, 255, 0.1); border-radius: 12px; overflow: hidden; }
        .domain-prefix { padding: 0 1.25rem; color: var(--text-dim); font-size: 0.9rem; border-right: 1px solid rgba(255, 255, 255, 0.1); height: 3.5rem; display: flex; align-items: center; background: rgba(255, 255, 255, 0.02); }
        .custom-slug-wrap input { border: none; background: transparent; }

        button.btn-primary {
            background: var(--gradient); color: white; border: none; border-radius: 12px;
            padding: 1.25rem; font-size: 1rem; font-weight: 600; cursor: pointer; transition: all 0.3s;
        }

        .success-card {
            background: rgba(16, 185, 129, 0.05);
            border: 1px solid rgba(16, 185, 129, 0.2);
            border-radius: 20px;
            padding: 1.5rem;
            margin-bottom: 2rem;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .new-link-wrap {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background: rgba(0, 0, 0, 0.3);
            padding: 1rem;
            border-radius: 12px;
            margin-top: 1rem;
        }

        .new-link { color: var(--accent); font-weight: 600; font-size: 1.2rem; text-decoration: none; }

        .copy-btn {
            background: var(--accent); color: white; border: none; border-radius: 8px;
            padding: 0.5rem 1rem; cursor: pointer; font-weight: 600;
        }

        footer { padding: 2rem; color: var(--text-dim); font-size: 0.85rem; text-align: center; }
    </style>
</head>
<body>
    <header>
        <div class="header-container">
            <div class="logo">link.mdgroup.id</div>
            <nav>
                @auth
                    <a href="{{ route('dashboard') }}" class="btn-outline">Dashboard</a>
                @else
                    <a href="{{ route('login') }}">Login</a>
                    <a href="{{ route('register') }}" class="btn-outline">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <h1>Sederhanakan <span style="color: var(--primary)">Link</span> Anda.</h1>
            <p>Paste URL panjang Anda sekarang dan buat link kustom untuk <strong>link.mdgroup.id</strong>.</p>
        </section>

        @if(session('new_link'))
        <section class="success-card">
            <p style="color: var(--accent); font-weight: 600; font-size: 0.9rem;">✓ Berhasil dipendekkan!</p>
            <div class="new-link-wrap">
                <a href="{{ session('new_link') }}" target="_blank" class="new-link">{{ str_replace(['http://', 'https://'], '', session('new_link')) }}</a>
                <button class="copy-btn" onclick="copyToClipboard('{{ session('new_link') }}', this)">Salin</button>
            </div>
        </section>
        @endif

        <section class="card">
            <form action="{{ route('shorten.store') }}" method="POST" class="input-group">
                @csrf
                <div class="form-control">
                    <label>URL Panjang</label>
                    <input type="text" name="original_url" placeholder="https://example.com/link-sangat-panjang" value="{{ old('original_url') }}">
                    @error('original_url')<p style="color: #ef4444; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p>@enderror
                </div>

                <div class="form-control">
                    <label>Alias Kustom (Opsional)</label>
                    <div class="custom-slug-wrap">
                        <span class="domain-prefix">{{ str_replace(['http://', 'https://'], '', url('/')) }}/</span>
                        <input type="text" name="short_code" placeholder="slug-kustom" value="{{ old('short_code') }}">
                    </div>
                    @error('short_code')<p style="color: #ef4444; font-size: 0.8rem; margin-top: 0.25rem;">{{ $message }}</p>@enderror
                </div>

                <button type="submit" class="btn-primary">Pendekkan Link</button>
            </form>
        </section>
    </main>

    <footer>
        &copy; {{ date('Y') }} link.mdgroup.id. All rights reserved.
    </footer>

    <script>
        function copyToClipboard(text, btn) {
            const originalText = btn.innerText;
            
            function showSuccess() {
                btn.innerText = 'Tersalin!';
                setTimeout(() => { btn.innerText = originalText; }, 2000);
            }

            if (navigator.clipboard && window.isSecureContext) {
                navigator.clipboard.writeText(text).then(showSuccess).catch(err => {
                    console.error('Failed to copy: ', err);
                    fallbackCopy(text, showSuccess);
                });
            } else {
                fallbackCopy(text, showSuccess);
            }
        }

        function fallbackCopy(text, callback) {
            const textArea = document.createElement("textarea");
            textArea.value = text;
            textArea.style.position = "fixed";
            textArea.style.left = "-9999px";
            textArea.style.top = "0";
            document.body.appendChild(textArea);
            textArea.focus();
            textArea.select();
            try {
                const successful = document.execCommand('copy');
                if (successful && callback) callback();
            } catch (err) {
                console.error('Fallback copy failed', err);
            }
            document.body.removeChild(textArea);
        }
    </script>
</body>
</html>

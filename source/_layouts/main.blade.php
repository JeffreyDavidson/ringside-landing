<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $page->description }}">
    <meta property="og:title" content="{{ $page->title }}">
    <meta property="og:description" content="{{ $page->description }}">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://theringside.app/">
    <meta property="og:site_name" content="Ringside">
    <meta property="og:image" content="https://theringside.app/images/marketing/ringside-social-v1.jpg">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:image:alt" content="Ringside — Run the show. Own the story. Wrestling promotion management, with a red-roped wrestling ring in a dark arena.">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="{{ $page->title }}">
    <meta name="twitter:description" content="{{ $page->description }}">
    <meta name="twitter:image" content="https://theringside.app/images/marketing/ringside-social-v1.jpg">
    <meta name="twitter:image:alt" content="Ringside — Run the show. Own the story. Wrestling promotion management, with a red-roped wrestling ring in a dark arena.">
    <meta name="theme-color" content="#101112">
    <link rel="canonical" href="https://theringside.app/">
    <link rel="icon" type="image/svg+xml" href="favicon.svg">
    <title>{{ $page->title }}</title>
    <link rel="stylesheet" href="css/marketing.css">
    <script src="https://cdn.usefathom.com/script.js" data-site="QZDCFJBS" defer></script>
    <script type="application/ld+json">
        {
            "@@context": "https://schema.org",
            "@@type": "SoftwareApplication",
            "name": "Ringside",
            "url": "https://theringside.app/",
            "description": "{{ $page->description }}",
            "applicationCategory": "BusinessApplication",
            "operatingSystem": "Web",
            "image": "https://theringside.app/images/marketing/arena.webp",
            "publisher": {
                "@@type": "Organization",
                "name": "Ringside",
                "url": "https://theringside.app/"
            }
        }
    </script>
    <style>
        .utility-flex { display: flex; }
        .utility-grid { display: grid; }
        .items-center { align-items: center; }
        .justify-between { justify-content: space-between; }
        .flex-wrap { flex-wrap: wrap; }
        .gap-3 { gap: .75rem; }
        .gap-5 { gap: 1.25rem; }
        .gap-6 { gap: 1.5rem; }
        .gap-10 { gap: 2.5rem; }
        .grid-cols-2 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
        .grid-cols-4 { grid-template-columns: repeat(4, minmax(0, 1fr)); }
        .text-signal { color: var(--color-ringside-signal); }
        @media (max-width: 760px) {
            .md-grid-cols-4 { grid-template-columns: repeat(2, minmax(0, 1fr)); }
            .desktop-link { display: none; }
            .page-width { width: min(100% - 2rem, 1280px); }
        }
    </style>
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <header id="top" class="site-header">
        <div class="page-width utility-flex items-center justify-between gap-6">
            <x-wordmark />
            <nav class="utility-flex items-center gap-5" aria-label="Main navigation">
                <a class="nav-link" href="#roster">Features</a>
                <a class="nav-link desktop-link" href="#how-it-works">How it works</a>
                <a class="button button-outline header-action" href="#waitlist">Join the founding class <x-icon.arrow-up-right /></a>
            </nav>
        </div>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer class="site-footer">
        <div class="page-width utility-flex flex-wrap items-center justify-between gap-6">
            <div class="utility-flex flex-wrap items-center gap-5"><x-wordmark /><p>© 2026 Ringside. Wrestling promotion management.</p></div>
            <a class="footer-link" href="#top">Back to top <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 7-7 7 7M12 5v14"/></svg></a>
        </div>
    </footer>

    <script>
        async function handleWaitlist(event) {
            event.preventDefault();
            const form = event.currentTarget;
            const button = form.querySelector('button');
            const status = document.getElementById('waitlist-status');
            button.disabled = true;
            button.textContent = 'Joining…';
            try {
                const response = await fetch('/api/waitlist.php', { method: 'POST', headers: {'Content-Type': 'application/json'}, body: JSON.stringify({ email: form.email.value, product: 'ringside' }) });
                const result = await response.json();
                if (!response.ok || !result.success) throw new Error('Unable to join');
                form.reset();
                status.textContent = "You're on the list. We'll be in touch.";
                button.textContent = 'You’re in';
            } catch {
                status.textContent = 'We could not save that email. Please try again.';
                button.textContent = 'Try again';
                button.disabled = false;
            }
        }
    </script>
</body>
</html>

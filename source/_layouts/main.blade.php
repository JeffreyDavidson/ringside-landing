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
    <link rel="stylesheet" href="css/tailwind.css">
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
</head>
<body>
    <a class="skip-link" href="#main">Skip to content</a>
    <header id="top" class="site-header">
        <x-page-width class="flex items-center justify-between gap-6 max-[767px]:gap-3.5">
            <x-wordmark />
            <nav class="flex items-center gap-5" aria-label="Main navigation">
                <a class="nav-link" href="#roster">Features</a>
                <a class="nav-link max-[760px]:!hidden" href="#how-it-works">How it works</a>
                <a class="button button-outline header-action" href="#waitlist">Join the founding class <x-icon.arrow-up-right /></a>
            </nav>
        </x-page-width>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer class="site-footer">
        <x-page-width class="flex flex-wrap items-center justify-between gap-6">
            <div class="flex flex-wrap items-center gap-5"><x-wordmark /><p>© 2026 Ringside. Wrestling promotion management.</p></div>
            <a class="footer-link" href="#top">Back to top <svg class="icon" viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 7-7 7 7M12 5v14"/></svg></a>
        </x-page-width>
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

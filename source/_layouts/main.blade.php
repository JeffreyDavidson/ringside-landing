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
    <link rel="stylesheet" href="css/tailwind-{{ $page->cssVersion }}.css">
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
    <div id="top" aria-hidden="true"></div>
    <a class="fixed left-4 top-4 z-10 -translate-y-[200%] bg-ringside-white p-4 text-ringside-black focus:translate-y-0" href="#main">Skip to content</a>
    <header class="sticky top-0 z-20 border-b border-ringside-white-subtle bg-ringside-surface-header py-5">
        <x-page-width class="flex items-center justify-between gap-6 max-[767px]:gap-3.5">
            <x-wordmark />
            <nav class="flex items-center gap-5" aria-label="Main navigation">
                <a class="inline-flex min-h-11 items-center font-semibold transition-colors hover:text-ringside-signal max-[430px]:!hidden" href="#roster">Features</a>
                <a class="inline-flex min-h-11 items-center font-semibold transition-colors hover:text-ringside-signal max-[760px]:!hidden" href="#how-it-works">How it works</a>
                <a class="inline-flex min-h-11 items-center justify-center gap-4 border border-ringside-outline px-5 py-2.5 font-bold transition-colors hover:border-ringside-white hover:bg-ringside-surface-faq max-[520px]:px-3 max-[520px]:text-sm max-[430px]:gap-2 max-[430px]:px-2.5 max-[430px]:text-xs" href="#waitlist">Join the founding class <x-icon.arrow-up-right /></a>
            </nav>
        </x-page-width>
    </header>

    <main id="main">
        @yield('content')
    </main>

    <footer class="border-t border-ringside-line py-8">
        <x-page-width class="flex flex-wrap items-center justify-between gap-6">
            <div class="flex flex-wrap items-center gap-5"><x-wordmark /><p>© 2026 Ringside. Wrestling promotion management.</p></div>
            <a class="inline-flex min-h-11 items-center gap-4 text-sm text-ringside-muted transition-colors hover:text-ringside-signal" href="#top">Back to top <svg class="h-5 w-5 flex-none stroke-current stroke-[1.8]" viewBox="0 0 24 24" aria-hidden="true"><path d="m5 12 7-7 7 7M12 5v14"/></svg></a>
        </x-page-width>
    </footer>

    <script>
        async function handleWaitlist(event) {
            event.preventDefault();
            const form = event.currentTarget;
            const button = form.querySelector('button');
            const label = button.querySelector('[data-waitlist-label]');
            const status = document.getElementById('waitlist-status');
            const email = form.elements.email.value.trim();

            if (!form.reportValidity()) {
                return;
            }

            button.disabled = true;
            button.setAttribute('aria-busy', 'true');
            label.textContent = 'Joining…';
            status.textContent = 'Saving your email…';
            status.classList.remove('text-ringside-signal');
            try {
                const response = await fetch('/api/waitlist.php', { method: 'POST', headers: {'Content-Type': 'application/json', 'Accept': 'application/json'}, body: JSON.stringify({ email, product: 'ringside', website: form.elements.website.value }) });
                const result = await response.json();
                if (response.status === 429) throw new Error('rate-limited');
                if (!response.ok || !result.success) throw new Error('Unable to join');
                form.reset();
                status.textContent = "You're on the list. We'll be in touch.";
                status.classList.add('text-ringside-signal');
                label.textContent = 'You’re in';
                button.removeAttribute('aria-busy');
            } catch (error) {
                status.textContent = error.message === 'rate-limited'
                    ? 'Too many attempts. Please wait before trying again.'
                    : 'We could not save that email. Please try again.';
                status.classList.add('text-ringside-signal');
                label.textContent = 'Try again';
                button.disabled = false;
                button.removeAttribute('aria-busy');
            }
        }
    </script>
</body>
</html>

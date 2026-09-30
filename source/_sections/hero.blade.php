<section class="relative isolate bg-ringside-surface-deep" aria-labelledby="hero-title">
    <img class="absolute inset-0 -z-10 h-full w-full object-cover object-[center_60%]" src="images/marketing/arena.webp" srcset="images/marketing/arena-960.webp 960w, images/marketing/arena.webp 1672w" sizes="100vw" width="1672" height="941" alt="" fetchpriority="high">
    <div class="absolute inset-0 -z-10 bg-[linear-gradient(90deg,var(--color-ringside-black-overlay),transparent_75%)]" aria-hidden="true"></div>
    <x-page-width class="flex min-h-[clamp(32rem,calc(100svh-7rem),42rem)] flex-col justify-center py-[clamp(2rem,3vw,3rem)]">
        <x-kicker class="mb-6">Built by a promoter who’s run shows since 2009</x-kicker>
        <x-display-heading tag="h1" id="hero-title" class="text-[clamp(3.2rem,7.5vw,7rem)] leading-[1.13]"><span class="block">Run the show.</span><span class="block text-signal">Own the story.</span></x-display-heading>
        <p class="my-6 max-w-[33rem] text-[clamp(1.1rem,1.6vw,1.35rem)] leading-[1.6] text-ringside-muted-bright text-pretty">Ringside knows who’s under contract, hurt or suspended before you book them, and keeps every result and title reign on the record.</p>
        <div class="flex flex-wrap gap-3">
            <a class="inline-flex min-h-14 items-center justify-center gap-4 border border-ringside-red bg-ringside-red px-7 py-3.5 text-base font-bold leading-[1.4] text-ringside-white shadow-ringside-glow transition-colors hover:border-ringside-red-dark hover:bg-ringside-red-dark" href="#waitlist">Join the founding class <x-icon.arrow-up-right /></a>
            <a class="inline-flex min-h-14 items-center justify-center gap-4 border border-ringside-outline px-7 py-3.5 text-base font-bold leading-[1.4] transition-colors hover:border-ringside-white hover:bg-ringside-surface-hover" href="#event-card">Explore Ringside <svg class="h-5 w-5 flex-none fill-none stroke-current stroke-[1.8]" viewBox="0 0 24 24" aria-hidden="true"><path d="M12 5v14m0 0 6-6m-6 6-6-6"/></svg></a>
        </div>
    </x-page-width>
</section>

<nav class="border-y border-ringside-line bg-ringside-surface-index" aria-label="Explore the features">
    <x-page-width class="grid grid-cols-3 max-[767px]:grid-cols-1">
        <a class="flex items-center gap-4 border-ringside-line px-6 py-6 text-base font-bold transition-colors hover:bg-ringside-surface-hover min-[768px]:border-l min-[768px]:last:border-r max-[767px]:border-b max-[767px]:px-0 max-[767px]:last:border-b-0" href="#event-card"><span>Build the card</span><x-icon.arrow-up-right class="ml-auto" /></a>
        <a class="flex items-center gap-4 border-ringside-line px-6 py-6 text-base font-bold transition-colors hover:bg-ringside-surface-hover min-[768px]:border-l min-[768px]:last:border-r max-[767px]:border-b max-[767px]:px-0 max-[767px]:last:border-b-0" href="#roster"><span>Know who can work</span><x-icon.arrow-up-right class="ml-auto" /></a>
        <a class="flex items-center gap-4 border-ringside-line px-6 py-6 text-base font-bold transition-colors hover:bg-ringside-surface-hover min-[768px]:border-l min-[768px]:last:border-r max-[767px]:border-b max-[767px]:px-0 max-[767px]:last:border-b-0" href="#history"><span>Keep the history</span><x-icon.arrow-up-right class="ml-auto" /></a>
    </x-page-width>
</nav>

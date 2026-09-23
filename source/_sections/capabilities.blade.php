<section id="capabilities" class="bg-ringside-surface-panel py-[clamp(4rem,5.5vw,5.5rem)]" aria-labelledby="capabilities-title">
    <x-page-width>
        <x-section-heading id="capabilities-title" heading="See the show before the bell." description="The event card is where the moving parts come together. Keep the plan legible before the lights go down." />
        <div class="mt-10 overflow-hidden border border-ringside-line-card border-t-[3px] border-t-ringside-signal bg-ringside-surface-card" aria-label="Illustrative Ringside event card">
            <div class="flex justify-between gap-4 border-b border-ringside-line px-5 py-4 text-xs font-bold tracking-[0.1em] text-ringside-muted-subtle"><span>RINGSIDE / EVENT CARD</span><span class="text-ringside-signal-soft">BUILDING</span></div>
            <div class="flex items-end justify-between gap-8 bg-gradient-to-br from-ringside-surface-panel to-ringside-surface-card px-5 py-8"><div><p class="mb-2 text-xs font-bold uppercase tracking-[0.08em] text-ringside-muted">Saturday · October 18</p><x-display-heading tag="h3" class="text-3xl sm:text-4xl">Autumn Collision</x-display-heading></div><span class="text-right font-display text-[3.5rem] leading-[0.8] text-ringside-signal">04<br><small class="font-body text-xs font-bold tracking-[0.1em] text-ringside-muted">MATCHES</small></span></div>
            <div class="grid grid-cols-2 max-[640px]:grid-cols-1">
                <x-operations-match number="01" title="Riverside Championship" detail="Title match" />
                <x-operations-match number="02" title="Tag Team Showcase" detail="2 vs 2" />
                <x-operations-match number="03" title="Open Challenge" detail="Singles" />
                <x-operations-match number="04" title="Main event" detail="To be announced" />
            </div>
            <div class="flex items-center gap-4 border-t border-ringside-line px-5 py-4 text-xs font-bold tracking-[0.1em] text-ringside-muted-subtle"><span>VENUE</span><strong class="mr-auto text-xs tracking-[0.08em] text-ringside-ink">Harbor Hall</strong><span>ROSTER</span><strong class="text-xs tracking-[0.08em] text-ringside-ink">18 ACTIVE</strong></div>
        </div>
        <div class="mt-12 grid grid-cols-[1fr_1.15fr] items-start gap-14 max-[900px]:grid-cols-1 max-[900px]:gap-10">
            <div class="max-w-lg">
                <x-kicker class="mb-4">The work behind the bell</x-kicker>
                <x-display-heading tag="h3" class="max-w-[12ch] text-[clamp(2.25rem,4vw,4rem)]">One view. No loose ends.</x-display-heading>
                <p class="mt-6 text-[1.1rem] leading-[1.7] text-ringside-muted">Bring the people, officials and championship into view while the card is still taking shape.</p>
            </div>
            <div>
                <div class="grid grid-cols-3 gap-4 border-t border-ringside-line pt-6" aria-label="Event card summary">
                    <div class="grid gap-1"><strong class="font-display text-3xl font-normal leading-none text-ringside-signal">18</strong><span class="text-xs font-bold uppercase leading-[1.3] tracking-[0.06em] text-ringside-muted">active roster</span></div>
                    <div class="grid gap-1"><strong class="font-display text-3xl font-normal leading-none text-ringside-signal">04</strong><span class="text-xs font-bold uppercase leading-[1.3] tracking-[0.06em] text-ringside-muted">matches booked</span></div>
                    <div class="grid gap-1"><strong class="font-display text-3xl font-normal leading-none text-ringside-signal">01</strong><span class="text-xs font-bold uppercase leading-[1.3] tracking-[0.06em] text-ringside-muted">title on the line</span></div>
                </div>
                <div class="mt-8 grid gap-3" aria-label="Show lifecycle">
                    <div class="flex items-baseline justify-between gap-4 border-t border-ringside-line pt-3"><span class="text-xs font-bold uppercase tracking-[0.08em] text-ringside-signal">Before</span><strong class="text-sm">Roster locked</strong></div>
                    <div class="flex items-baseline justify-between gap-4 border-t border-ringside-line pt-3"><span class="text-xs font-bold uppercase tracking-[0.08em] text-ringside-signal">During</span><strong class="text-sm">Card in context</strong></div>
                    <div class="flex items-baseline justify-between gap-4 border-t border-ringside-line pt-3"><span class="text-xs font-bold uppercase tracking-[0.08em] text-ringside-signal">After</span><strong class="text-sm">History updated</strong></div>
                </div>
            </div>
        </div>
    </x-page-width>
</section>

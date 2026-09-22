<section id="capabilities" class="bg-ringside-surface-panel py-[clamp(4rem,5.5vw,5.5rem)]" aria-labelledby="capabilities-title">
    <x-page-width>
        <x-section-heading id="capabilities-title" heading="See the show before the bell." description="The event card is where the moving parts come together. Keep the plan legible before the lights go down." />
        <div class="mt-11 grid grid-cols-[1.2fr_0.8fr] items-center gap-16 max-[900px]:grid-cols-1 max-[900px]:gap-12">
            <div class="overflow-hidden border border-ringside-line-card border-t-[3px] border-t-ringside-signal bg-ringside-surface-card" aria-label="Illustrative Ringside event card">
                <div class="flex justify-between gap-4 border-b border-ringside-line px-5 py-4 text-[0.7rem] font-bold tracking-[0.1em] text-ringside-muted-subtle"><span>RINGSIDE / EVENT CARD</span><span class="text-ringside-signal-soft">BUILDING</span></div>
                <div class="flex items-end justify-between gap-8 bg-gradient-to-br from-ringside-surface-panel to-ringside-surface-card px-5 py-8"><div><p class="mb-2 text-xs font-bold uppercase tracking-[0.08em] text-ringside-muted">Saturday · October 18</p><x-display-heading tag="h3" class="text-[clamp(2rem,4vw,3.5rem)]">Autumn Collision</x-display-heading></div><span class="text-right font-display text-[3.5rem] leading-[0.8] text-ringside-signal">04<br><small class="font-body text-[0.55rem] font-bold tracking-[0.1em] text-ringside-muted">MATCHES</small></span></div>
                <div>
                    <x-operations-match number="01" title="Riverside Championship" detail="Title match" />
                    <x-operations-match number="02" title="Tag Team Showcase" detail="2 vs 2" />
                    <x-operations-match number="03" title="Open Challenge" detail="Singles" />
                    <x-operations-match number="04" title="Main event" detail="To be announced" />
                </div>
                <div class="flex items-center gap-4 border-t border-ringside-line px-5 py-4 text-[0.7rem] font-bold tracking-[0.1em] text-ringside-muted-subtle"><span>VENUE</span><strong class="mr-auto text-[0.7rem] tracking-[0.08em] text-ringside-ink">Harbor Hall</strong><span>ROSTER</span><strong class="text-[0.7rem] tracking-[0.08em] text-ringside-ink">18 ACTIVE</strong></div>
            </div>
            <div class="max-w-md">
                <x-kicker class="mb-4">The work behind the bell</x-kicker>
                <x-display-heading tag="h3" class="max-w-[9ch] text-[clamp(2.25rem,4vw,4rem)]">One view. No loose ends.</x-display-heading>
                <p class="mt-6 text-[1.1rem] leading-[1.7] text-ringside-muted">Rosters, events, matches and titles stay connected as your promotion moves from plan to result.</p>
                <ul class="mt-8 grid gap-3"><x-checklist-item text="One connected roster" /><x-checklist-item text="Every match card in context" /><x-checklist-item text="History that follows the title" /></ul>
                <div class="mt-8 grid grid-cols-3 gap-4 border-t border-ringside-line pt-6" aria-label="Event card summary">
                    <div class="grid gap-1"><strong class="font-display text-3xl font-normal leading-none text-ringside-signal">18</strong><span class="text-[0.7rem] font-bold uppercase leading-[1.3] tracking-[0.06em] text-ringside-muted">active roster</span></div>
                    <div class="grid gap-1"><strong class="font-display text-3xl font-normal leading-none text-ringside-signal">04</strong><span class="text-[0.7rem] font-bold uppercase leading-[1.3] tracking-[0.06em] text-ringside-muted">matches booked</span></div>
                    <div class="grid gap-1"><strong class="font-display text-3xl font-normal leading-none text-ringside-signal">01</strong><span class="text-[0.7rem] font-bold uppercase leading-[1.3] tracking-[0.06em] text-ringside-muted">title on the line</span></div>
                </div>
                <div class="mt-7 grid gap-3" aria-label="Show lifecycle">
                    <div class="flex items-baseline justify-between gap-4 border-t border-ringside-line pt-3"><span class="text-[0.7rem] font-bold uppercase tracking-[0.08em] text-ringside-signal">Before</span><strong class="text-[0.9rem]">Roster locked</strong></div>
                    <div class="flex items-baseline justify-between gap-4 border-t border-ringside-line pt-3"><span class="text-[0.7rem] font-bold uppercase tracking-[0.08em] text-ringside-signal">During</span><strong class="text-[0.9rem]">Card in context</strong></div>
                    <div class="flex items-baseline justify-between gap-4 border-t border-ringside-line pt-3"><span class="text-[0.7rem] font-bold uppercase tracking-[0.08em] text-ringside-signal">After</span><strong class="text-[0.9rem]">History updated</strong></div>
                </div>
            </div>
        </div>
    </x-page-width>
</section>

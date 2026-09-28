<section id="event-card" class="bg-ringside-surface-panel py-[clamp(4rem,5.5vw,5.5rem)]" aria-labelledby="event-card-title">
    <x-page-width>
        <x-section-heading id="event-card-title" heading="Build a card you can actually run." description="Pick from 14 match types, then add competitors, referees and titles. Ringside only lets you book people who are under contract and cleared to work." />
        <div class="mt-10 overflow-hidden border border-ringside-line-card border-t-[3px] border-t-ringside-signal bg-ringside-surface-card" aria-label="Illustrative Ringside event card">
            <div class="flex justify-between gap-4 border-b border-ringside-line px-5 py-4 text-xs font-bold tracking-[0.1em] text-ringside-muted-subtle"><span>RINGSIDE / EVENT CARD</span><span class="text-ringside-signal-soft">SCHEDULED</span></div>
            <div class="flex flex-wrap items-end justify-between gap-x-8 gap-y-2 px-5 py-8"><div><p class="mb-2 text-xs font-bold uppercase tracking-[0.08em] text-ringside-muted">Sample show · Harbor Hall</p><x-display-heading tag="h3" class="text-3xl sm:text-4xl">Autumn Collision</x-display-heading></div><p class="text-xs font-bold uppercase tracking-[0.1em] text-ringside-muted">4 matches</p></div>
            <div class="grid grid-cols-2 max-[640px]:grid-cols-1">
                <x-operations-match number="01" title="Riverside Championship" detail="Singles · Title match" />
                <x-operations-match number="02" title="Tag Team Showcase" detail="Tag team" />
                <x-operations-match number="03" title="Open Challenge" detail="Triple threat" />
                <x-operations-match number="04" title="Main event" detail="Fatal 4-way" />
            </div>
            <div class="flex flex-wrap items-center gap-x-4 gap-y-1 border-t border-ringside-line px-5 py-4 text-sm"><span class="text-xs font-bold uppercase tracking-[0.1em] text-ringside-signal">Blocked</span><strong>Chris Moreno</strong><span class="text-ringside-muted">Injured · not available for booking</span></div>
        </div>
    </x-page-width>
</section>

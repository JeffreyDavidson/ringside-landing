<section class="border-t-[3px] border-t-ringside-red bg-ringside-surface-index" id="waitlist" aria-labelledby="closing-title">
    <x-page-width class="grid grid-cols-[1.25fr_1fr] items-center gap-24 py-[clamp(4rem,7vw,7rem)] max-[900px]:grid-cols-1 max-[900px]:gap-10">
        <div><x-kicker class="mb-4">Founding access</x-kicker><x-display-heading id="closing-title" class="text-[clamp(2.6rem,4.5vw,4.5rem)]">Build the tool your promotion should have had from the start.</x-display-heading></div>
        <div>
            <p class="text-[1.125rem] leading-[1.75] text-ringside-muted text-pretty">Join the founding class and help shape the way independent wrestling promotions organize their next show.</p>
            <form class="mt-6 flex flex-wrap gap-3" onsubmit="handleWaitlist(event)" novalidate>
                <label class="sr-only" for="waitlist-email">Email address</label>
                <input class="min-h-14 min-w-0 flex-1 border border-ringside-line-bright bg-ringside-surface-card px-4 text-ringside-ink placeholder:text-ringside-muted-subtle focus:border-ringside-white focus:outline-3 focus:outline-ringside-white focus:outline-offset-2 max-[520px]:basis-full" id="waitlist-email" name="email" type="email" placeholder="you@example.com" autocomplete="email" aria-describedby="waitlist-status" required>
                <button class="inline-flex min-h-14 items-center justify-center gap-4 border border-ringside-red bg-ringside-red px-7 py-3.5 text-base font-bold leading-[1.4] text-ringside-white transition-colors hover:border-ringside-red-dark hover:bg-ringside-red-dark max-[520px]:w-full" type="submit"><span data-waitlist-label>Join the founding class</span> <x-icon.arrow-up-right /></button>
            </form>
            <p class="mt-3 text-sm text-ringside-muted-subtle" id="waitlist-status" role="status" aria-live="polite">No spam. Just launch updates.</p>
            <div class="mt-6 flex flex-wrap gap-x-6 gap-y-3 text-[0.7rem] font-bold uppercase tracking-[0.08em] text-ringside-muted-subtle" aria-label="Founding class details">
                <span class="inline-flex items-center gap-3 before:h-1.5 before:w-1.5 before:bg-ringside-signal before:content-['']">Early access</span>
                <span class="inline-flex items-center gap-3 before:h-1.5 before:w-1.5 before:bg-ringside-signal before:content-['']">Product feedback</span>
                <span class="inline-flex items-center gap-3 before:h-1.5 before:w-1.5 before:bg-ringside-signal before:content-['']">Launch updates</span>
            </div>
        </div>
    </x-page-width>
</section>

<section class="border-t-[3px] border-t-ringside-red bg-ringside-surface-index" id="waitlist" aria-labelledby="closing-title">
    <x-page-width class="grid grid-cols-[1.25fr_1fr] items-center gap-24 py-[clamp(4rem,7vw,7rem)] max-[900px]:grid-cols-1 max-[900px]:gap-10">
        <div>
            <x-display-heading id="closing-title" class="text-[clamp(2.6rem,4.5vw,4.5rem)]">Get early access to Ringside.</x-display-heading>
            <div class="mt-10 max-w-lg border-t border-ringside-line pt-6">
                <p class="text-xs font-bold uppercase tracking-[0.1em] text-ringside-signal">Built by someone who’s run the show</p>
                <p class="mt-3 text-base leading-[1.75] text-ringside-muted text-pretty">I grew up on 90s wrestling, became an indy wrestler in 2007, and started promoting my own company in 2009. The hard part was never the shows. It was keeping track of event plans and keeping our website up to date. I couldn’t find an easy way to do that, so I built Ringside.</p>
                <p class="mt-3 text-sm font-bold">Jeffrey Davidson, founder</p>
            </div>
        </div>
        <div>
            <p class="text-[1.125rem] leading-[1.75] text-ringside-muted text-pretty">Join the founding list for product updates and launch details.</p>
            <form class="mt-6 flex flex-wrap gap-3" action="/api/waitlist.php" method="post" onsubmit="handleWaitlist(event)">
                <label class="sr-only" for="waitlist-email">Email address</label>
                <input class="min-h-14 min-w-0 basis-full border border-ringside-line-bright bg-ringside-surface-card px-4 text-ringside-ink placeholder:text-ringside-muted-subtle focus:border-ringside-white focus:outline-3 focus:outline-ringside-white focus:outline-offset-2" id="waitlist-email" name="email" type="email" placeholder="you@example.com" autocomplete="email" spellcheck="false" aria-describedby="waitlist-status waitlist-note" required>
                <input type="hidden" name="product" value="ringside">
                <div class="absolute left-[-10000px] h-px w-px overflow-hidden" aria-hidden="true">
                    <label for="waitlist-website">Leave this field empty</label>
                    <input id="waitlist-website" name="website" type="text" tabindex="-1" autocomplete="off">
                </div>
                <button class="inline-flex min-h-14 items-center justify-center gap-4 border border-ringside-red bg-ringside-red px-7 py-3.5 text-base font-bold leading-[1.4] text-ringside-white transition-colors hover:border-ringside-red-dark hover:bg-ringside-red-dark max-[520px]:w-full" type="submit"><span data-waitlist-label>Join the founding class</span> <x-icon.arrow-up-right /></button>
            </form>
            <p class="mt-3 text-sm font-bold empty:hidden" id="waitlist-status" role="status" aria-live="polite"></p>
            <p class="mt-3 text-sm text-ringside-muted-subtle" id="waitlist-note">No spam. We’ll only contact you about early access, product feedback, and Ringside launch updates.</p>
            <p class="mt-2 text-sm leading-relaxed text-ringside-muted-subtle">Your email is sent to Resend to manage the founding list and is used for early access, product feedback, and Ringside launch updates.</p>
        </div>
    </x-page-width>
</section>

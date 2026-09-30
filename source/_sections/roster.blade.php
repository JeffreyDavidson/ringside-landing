<section id="roster" class="mx-auto w-[calc(100%-6rem)] max-w-[80rem] py-[clamp(4rem,6vw,6rem)] max-[767px]:w-[calc(100%-2.5rem)]" aria-labelledby="roster-title">
    <div class="grid grid-cols-[minmax(0,1.2fr)_minmax(0,1fr)] items-start gap-x-14 gap-y-12 max-[900px]:grid-cols-1 max-[900px]:gap-y-10">
        <x-section-heading id="roster-title" size="text-[clamp(2.4rem,4vw,3.75rem)]" heading="Know who can work before you book." description="Contracts, injuries, suspensions and retirements for wrestlers, tag teams, managers and referees. A tag team is only bookable when every member is." />
        <ul class="grid gap-6">
            <li class="border-t border-ringside-line pt-5">
                <h3 class="text-lg font-bold">Know who is ready.</h3>
                <p class="mt-2 leading-[1.7] text-ringside-muted">Contracts, injuries and suspensions are tracked for every wrestler, so availability is never a guess.</p>
            </li>
            <li class="border-t border-ringside-line pt-5">
                <h3 class="text-lg font-bold">Know who belongs together.</h3>
                <p class="mt-2 leading-[1.7] text-ringside-muted">Tag teams and stables keep their full membership history, not just today’s lineup.</p>
            </li>
            <li class="border-t border-ringside-line pt-5">
                <h3 class="text-lg font-bold">Give every role a place.</h3>
                <p class="mt-2 leading-[1.7] text-ringside-muted">Managers and referees live on the same roster, with the same status tracking.</p>
            </li>
        </ul>
        <figure class="col-span-2 max-w-[50rem] max-[900px]:col-span-1">
            <div class="overflow-hidden border border-ringside-line-card border-t-[3px] border-t-ringside-signal bg-ringside-surface-card">
                <picture>
                    <source media="(max-width: 767px)" srcset="images/product/booking-blocked-mobile.webp" width="796" height="296">
                    <img class="block h-auto w-full" src="images/product/booking-blocked.webp" width="1580" height="296" alt="Ringside’s add-match form with Sam Whitlock chosen as a competitor and the error: This wrestler is not available for booking." loading="lazy">
                </picture>
            </div>
            <figcaption class="mt-3 text-xs text-ringside-muted-subtle">Sam Whitlock is injured, so Ringside won’t book him. Shown with sample data.</figcaption>
        </figure>
    </div>
</section>

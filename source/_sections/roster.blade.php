<section id="roster" class="mx-auto w-[calc(100%-6rem)] max-w-[80rem] py-[clamp(4rem,6vw,6rem)] max-[767px]:w-[calc(100%-2.5rem)]" aria-labelledby="roster-title">
    <div class="grid grid-cols-[minmax(0,1fr)_minmax(0,1fr)] items-start gap-14 max-[1100px]:grid-cols-1 max-[1100px]:gap-10">
        <div>
            <x-section-heading id="roster-title" size="text-[clamp(2.4rem,4vw,3.75rem)]" heading="Know who can work before you book." description="Contracts, injuries, suspensions and retirements for wrestlers, tag teams, managers and referees. A tag team is only bookable when every member is." />
            <ul class="mt-10 grid max-w-xl gap-6">
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
        </div>
        <figure class="max-w-[42.5rem]">
            <div class="overflow-hidden border border-ringside-line-card bg-ringside-surface-card">
                <picture>
                    <source media="(max-width: 767px)" srcset="images/product/roster-availability-mobile.webp" width="716" height="1114">
                    <img class="block h-auto w-full" src="images/product/roster-availability.webp" width="1360" height="1134" alt="Ringside’s wrestler roster. Every wrestler shows as Employed; Sam Whitlock also carries an Injured badge and Dante Cruz a Suspended badge." loading="lazy">
                </picture>
            </div>
            <figcaption class="mt-3 text-xs text-ringside-muted-subtle">Sam Whitlock is injured and Dante Cruz is suspended, so Ringside labels them and won’t book either. Shown with sample data.</figcaption>
        </figure>
    </div>
</section>

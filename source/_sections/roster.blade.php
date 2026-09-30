<section id="roster" class="mx-auto w-[calc(100%-6rem)] max-w-[80rem] py-[clamp(4rem,7vw,7rem)] max-[767px]:w-[calc(100%-2.5rem)]" aria-labelledby="roster-title">
    <x-section-heading id="roster-title" heading="Know who can work before you book." description="Contracts, injuries, suspensions and retirements for wrestlers, tag teams, managers and referees. A tag team is only bookable when every member is." />
    <figure class="mt-10 max-w-[50rem]">
        <div class="overflow-hidden border border-ringside-line-card border-t-[3px] border-t-ringside-signal bg-ringside-surface-card">
            <picture>
                <source media="(max-width: 767px)" srcset="images/product/booking-blocked-mobile.webp" width="796" height="296">
                <img class="block h-auto w-full" src="images/product/booking-blocked.webp" width="1580" height="296" alt="Ringside’s add-match form with Sam Whitlock chosen as a competitor and the error: This wrestler is not available for booking." loading="lazy">
            </picture>
        </div>
        <figcaption class="mt-3 text-xs text-ringside-muted-subtle">Sam Whitlock is injured, so Ringside won’t book him. Shown with sample data.</figcaption>
    </figure>
    <div class="mt-14 max-w-3xl">
        <x-roster-row number="01" title="Know who is ready.">Contracts, injuries and suspensions are tracked for every wrestler, so availability is never a guess.</x-roster-row>
        <x-roster-row number="02" title="Know who belongs together.">Tag teams and stables keep their full membership history, not just today’s lineup.</x-roster-row>
        <x-roster-row number="03" title="Give every role a place.">Managers and referees live on the same roster, with the same status tracking.</x-roster-row>
    </div>
</section>

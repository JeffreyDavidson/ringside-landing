<section class="closing-section py-[clamp(4rem,7vw,7rem)] mx-auto w-[calc(100%-6rem)] max-w-[80rem] max-[767px]:w-[calc(100%-2.5rem)]" id="waitlist" aria-labelledby="closing-title">
    <div><x-kicker class="mb-4">Founding access</x-kicker><x-display-heading id="closing-title" class="text-[clamp(2.6rem,4.5vw,4.5rem)]">Build the tool your promotion should have had from the start.</x-display-heading></div>
    <div>
        <p>Join the founding class and help shape the way independent wrestling promotions organize their next show.</p>
        <form class="waitlist-form" onsubmit="handleWaitlist(event)">
            <label class="sr-only" for="waitlist-email">Email address</label>
            <input id="waitlist-email" name="email" type="email" placeholder="you@example.com" required>
            <button class="button button-primary" type="submit">Join the founding class <x-icon.arrow-up-right /></button>
        </form>
        <p class="form-note" id="waitlist-status" aria-live="polite">No spam. Just launch updates.</p>
        <div class="closing-meta" aria-label="Founding class details">
            <span>Early access</span>
            <span>Product feedback</span>
            <span>Launch updates</span>
        </div>
    </div>
</section>

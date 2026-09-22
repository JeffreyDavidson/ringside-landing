<section class="closing-section section-pad page-width" id="waitlist" aria-labelledby="closing-title">
    <h2 id="closing-title" class="display">Your promotion. Your next chapter.</h2>
    <div>
        <p>Join the founding class and be the first to know when Ringside is ready for your next show.</p>
        <form class="waitlist-form" onsubmit="handleWaitlist(event)">
            <label class="sr-only" for="waitlist-email">Email address</label>
            <input id="waitlist-email" name="email" type="email" placeholder="you@example.com" required>
            <button class="button button-primary" type="submit">Join the waitlist <x-icon.arrow-up-right /></button>
        </form>
        <p class="form-note" id="waitlist-status" aria-live="polite">No spam. Just launch updates.</p>
    </div>
</section>

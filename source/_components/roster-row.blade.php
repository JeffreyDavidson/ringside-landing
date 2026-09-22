@props(['number', 'title'])

<div class="grid grid-cols-[3rem_1fr_1.15fr] items-center gap-8 border-t border-ringside-line py-8 last:border-b max-[767px]:grid-cols-[2rem_1fr] max-[767px]:gap-x-4 max-[767px]:gap-y-2">
    <span class="self-start pt-1.5 text-xs font-bold tracking-[0.08em] text-ringside-signal">{{ $number }}</span>
    <x-display-heading tag="h3" class="text-[clamp(1.65rem,2.8vw,2.3rem)]">{{ $title }}</x-display-heading>
    <p class="text-base leading-[1.75] text-ringside-muted max-[767px]:col-start-2">{{ $slot }}</p>
</div>

@props(['id', 'heading', 'description'])

<div class="max-w-4xl">
    <x-display-heading id="{{ $id }}" class="max-w-[18ch] text-[clamp(2.6rem,4.5vw,4.5rem)]">{{ $heading }}</x-display-heading>
    <p class="mt-5 max-w-2xl text-[1.125rem] leading-[1.75] text-ringside-muted text-pretty">{{ $description }}</p>
</div>

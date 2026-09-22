@props(['id', 'heading', 'description'])

<div class="section-heading">
    <x-display-heading id="{{ $id }}" class="text-[clamp(2.6rem,4.5vw,4.5rem)]">{{ $heading }}</x-display-heading>
    <p>{{ $description }}</p>
</div>

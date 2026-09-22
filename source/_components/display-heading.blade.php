@props(['tag' => 'h2'])

<{{ $tag }} {{ $attributes->class(['font-display font-normal uppercase tracking-[-0.015em] leading-[1.1] text-balance']) }}>
    {{ $slot }}
</{{ $tag }}>

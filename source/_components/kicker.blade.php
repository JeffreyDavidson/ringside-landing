@props(['class' => ''])

<p {{ $attributes->class(['font-body text-[0.75rem] font-bold uppercase tracking-[0.1em] text-ringside-signal', $class]) }}>
    {{ $slot }}
</p>

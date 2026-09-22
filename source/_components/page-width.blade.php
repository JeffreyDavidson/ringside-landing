@props(['class' => ''])

<div {{ $attributes->class(['mx-auto w-[calc(100%-6rem)] max-w-[80rem] max-[767px]:w-[calc(100%-2.5rem)]', $class]) }}>
    {{ $slot }}
</div>

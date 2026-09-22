@props(['question'])

<details class="border-b border-ringside-line-bright first:border-t">
    <summary class="flex min-h-16 cursor-pointer list-none items-center justify-between gap-8 text-[1.0625rem] font-semibold transition-colors hover:text-ringside-signal [&::-webkit-details-marker]:hidden">{{ $question }} <span aria-hidden="true" class="text-2xl font-normal transition-transform">+</span></summary>
    <div class="pb-6 pr-12 text-ringside-muted leading-[1.75]">{{ $slot }}</div>
</details>

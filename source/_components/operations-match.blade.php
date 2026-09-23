@props(['number', 'title', 'detail'])

<div class="grid grid-cols-[2rem_1fr_auto] items-center gap-4 border-t border-ringside-line px-5 py-4 max-[480px]:grid-cols-[2rem_1fr] max-[480px]:gap-y-1">
    <span class="text-xs font-bold text-ringside-signal">{{ $number }}</span>
    <strong class="text-base">{{ $title }}</strong>
    <em class="text-xs not-italic text-ringside-muted max-[480px]:col-start-2">{{ $detail }}</em>
</div>

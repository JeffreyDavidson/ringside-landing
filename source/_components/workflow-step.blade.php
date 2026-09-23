@props(['number', 'title'])

<div class="relative border-r border-ringside-white-third px-0 pt-6 before:absolute before:left-0 before:top-[-1px] before:w-10 before:border-t-[3px] before:border-ringside-signal before:content-[''] last:border-r-0 max-[767px]:border-r-0 max-[767px]:border-b max-[767px]:pb-6 max-[767px]:pt-4">
    <span class="mb-5 block font-bold text-ringside-white max-[767px]:mb-3">{{ $number }}</span>
    <x-display-heading tag="h3" class="mb-3 text-2xl max-[767px]:mb-2 max-[767px]:text-xl">{{ $title }}</x-display-heading>
    <p class="text-base leading-[1.6]">{{ $slot }}</p>
</div>

@props(['question'])

<details>
    <summary>{{ $question }} <span aria-hidden="true">+</span></summary>
    {{ $slot }}
</details>

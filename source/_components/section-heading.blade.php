@props(['id', 'heading', 'description'])

<div class="section-heading">
    <h2 id="{{ $id }}" class="display">{{ $heading }}</h2>
    <p>{{ $description }}</p>
</div>

@props(['variation' => ''])

<div class="card-file{{ $variation ? ' ' . $variation : '' }}">
    {{ $slot }}
</div>

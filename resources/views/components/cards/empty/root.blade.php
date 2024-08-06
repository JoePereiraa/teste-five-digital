@props(['text'])

<div class="card-empty">
    <img src="{{ asset('images/icons/ico_info.png') }}">
    <span>{{ $text ?? 'Nada disponível'}}</span>
</div>

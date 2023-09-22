@props(['url'])@php
    if (!filter_var($url, FILTER_VALIDATE_URL)) {
        $url = asset('storage/' . $url);
    }
@endphp<img src="{{ $url }}"
            class="rounded-full"
            width="50"
            height="50"
        {{ $attributes }}
>

@props(['message' => ''])

@if ($message)
    <div x-data="{ show: true }"
         x-init="setTimeout(() => show = false, 3000)"
         x-show="show"
            {{ $attributes->class(['fixed bg-blue-500 text-white py-2 px-4 rounded-xl bottom-3 right-3 text-sm ']) }}>
        <p>{{ $message }}</p>
    </div>
@endif

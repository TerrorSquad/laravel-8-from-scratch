@props(['time', 'fullTimeMessage' => 'Posted at', 'humanTimeMessage' => 'Posted'])

<span {{ $attributes->merge(['class' => 'mt-2 block text-gray-400 text-xs']) }} >
    <div x-data="{ showFullDate: false}"
         @click="showFullDate = !showFullDate"
         {{ $attributes->class(['text-xs']) }}
         title="{{ $time->format('Y-m-d H:i:s') }}"
    >
    <div x-show="!showFullDate">
        <span>{{ $humanTimeMessage }}</span>
        <time>{{ $time->diffForHumans() }}</time>
    </div>
    <div x-show="showFullDate"
         style="display: none">
        <span>{{ $fullTimeMessage }}</span>
        <time>{{ $time->format('Y-m-d H:i:s') }}</time>
    </div>
</div>
</span>

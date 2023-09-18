@props(['comment'])
<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?u={{ $comment->user_id }}"
                 alt=""
                 width="60"
                 height="60"
                 class="rounded-xl"
            >
        </div>

        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->name }}</h3>
                <div x-data="{ showFullDate: false}"
                     @click="showFullDate = !showFullDate"
                     class="text-xs"
                     title="{{ $comment->created_at->format('Y-m-d H:i:s') }}"
                >
                    <div x-show="!showFullDate">
                        <span>Posted</span>
                        <time>{{ $comment->created_at->diffForHumans() }}</time>
                    </div>
                    <div x-show="showFullDate">
                        <span>Posted at</span>
                        <time>{{ $comment->created_at->format('Y-m-d H:i:s') }}</time>
                    </div>
                </div>
            </header>
            <p>
                {{ $comment->body }}
            </p>
        </div>
    </article>
</x-panel>

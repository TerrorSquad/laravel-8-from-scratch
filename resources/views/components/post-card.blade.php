@props(['post'])
<article
        {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ filter_var($post->thumbnail, FILTER_VALIDATE_URL) ? $post->thumbnail : asset('storage/' . $post->thumbnail) }}"
                 alt="Blog Post illustration"
                 class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
                <div class="space-x-2">
                    <x-category-button :category="$post->category"/>
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <x-time-human-or-full :time="$post->created_at"
                                          :human-time-message="'Published'"
                                          :full-time-message="'Published at'"/>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">

                {!!   $post->excerpt !!}

            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">

                    <x-image-author url="{{ $post->author->photo }}"/>

                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}">
                                {{ $post->author->name }}
                            </a>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"> Read More </a>
                </div>
            </footer>
        </div>
    </div>
</article>

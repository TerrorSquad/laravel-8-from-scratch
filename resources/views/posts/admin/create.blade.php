<x-layout>
    <section class="max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">Publish a new post</h1>

        <x-panel class="">
            <form method="POST"
                  action="/admin/posts"
                  enctype="multipart/form-data"
            >
                @csrf

                <div x-data="{ title: '{{ old('title') }}', slug: '{{ old('slug') }}' }">

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="title"
                        >
                            Title
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="title"
                               id="title"
                               required
                               x-model="title"

                        >

                        @error('title')
                        <p class="
                               text-red-500
                               text-xs
                               mt-2">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="slug"
                        >
                            Slug
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="slug"
                               id="slug"
                               required
                               x-model="title.toLowerCase().replaceAll(' ', '-')"
                               readonly
                        >

                        @error('slug')
                        <p class="
                                           text-red-500
                                           text-xs
                                           mt-2">{{ $message }}</p>
                        @enderror
                    </div>
                </div>


                <div>
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="thumbnail">
                        Thumbnail
                    </label>

                    <input type="file"
                           name="thumbnail"
                           id="thumbnail"
                           required
                           accept="image/jpeg, image/png"
                           class="border border-gray-400 p-2 w-full">


                    @error('thumbnail')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="excerpt"
                    >
                        Excerpt
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="excerpt"
                              id="excerpt"
                              required
                    >{{ old('excerpt') }}</textarea>

                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="body"
                    >
                        Body
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="body"
                              id="body"
                              required
                    >{{ old('body') }}</textarea>

                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="category_id"
                    >
                        Category
                    </label>

                    <select name="category_id"
                            id="category_id">
                        @foreach ($categories as $category)
                            <option
                                    value="{{ $category->id }}"
                                    {{ old('category_id') == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <x-button-submit>Publish</x-button-submit>
            </form>
        </x-panel>
    </section>
</x-layout>

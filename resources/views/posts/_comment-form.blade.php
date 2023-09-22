@auth
    <x-panel>
        <form method="POST"
              action="{{ route('post.comment', $post) }}">
            @csrf
            <header class="flex items-center">
                <x-image-author url="{{  auth()->user()->photo }}"/>
                <h2 class="ml-4">Want to participate?</h2>
            </header>


            <div class="mt-6">
                                <textarea name="body"
                                          id="body"
                                          rows="5"
                                          class="text-sm w-full focus:outline-none focus:ring p-2"
                                          placeholder="Quick think of something to say"
                                          required></textarea>
            </div>

            @error('body')
            <span class="text-xs text-red-500">{{ $message }}</span>
            @enderror

            <div class="flex justify-end mt-6 pt-6 border-t border-gray-200">
                <x-form.button>Post</x-form.button>
            </div>
        </form>
    </x-panel>
@else
    <p class="">
        <a href="{{ route('register.create') }}"
           class="hover:underline font-semibold"> Register </a> or <a href="{{ route('sessions.create') }}"
                                                                      class="hover:underline font-semibold"> Login </a> to leave a comment.
    </p>
@endauth

<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Register!</h1>

            <form method="POST"
                  action="/register"
                  class="mt-10"
            >
                @csrf

                <div class="mb-6 text-center">
                    <label for="name"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Name
                    </label>
                    <input
                            type="text"
                            name="name"
                            id="name"
                            class="border border-gray-400 p-2 w-full lg:w-1/2"
                            value="{{ old('name') }}"
                            required
                    >

                    @error('name')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6 text-center">
                    <label for="username"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Username
                    </label>
                    <input
                            type="text"
                            name="username"
                            id="username"
                            class="border border-gray-400 p-2 w-full lg:w-1/2"
                            value="{{ old('username') }}"
                            required
                    >

                    @error('username')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6 text-center">
                    <label for="email"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Email
                    </label>
                    <input
                            type="email"
                            name="email"
                            id="email"
                            class="border border-gray-400 p-2 w-full lg:w-1/2"
                            value="{{ old('email') }}"
                            required
                    >

                    @error('email')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>


                <div class="mb-6 text-center">
                    <label for="password"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Password
                    </label>
                    <input
                            type="password"
                            name="password"
                            id="password"
                            class="border border-gray-400 p-2 w-full lg:w-1/2"
                            required
                    >

                    @error('password')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                {{--                @if($errors->any())--}}
                {{--                    <ul class="mb-5">--}}
                {{--                        @foreach($errors->all() as $error)--}}
                {{--                            <li class="text-red-600 text-xs">{{ $error }}</li>--}}
                {{--                        @endforeach--}}
                {{--                    </ul>--}}
                {{--                @endif--}}

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Register
                </button>
            </form>
        </main>
    </section>
</x-layout>

<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-300 p-6 rounded-xl">
            <h1 class="text-center font-bold text-xl">Log In</h1>

            <form method="POST"
                  action="{{ route('sessions.store') }}"
                  class="mt-10"
            >
                @csrf


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

                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">
                    Log In
                </button>
            </form>

        </main>
    </section>
</x-layout>

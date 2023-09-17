<div>
    <x-dropdown>

        <x-slot:trigger>
            <button @click.away="show = false" class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-40 text-left flex lg:inline-flex">
                {{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}
                <x-arrow-down class="absolute pointer-events-none" style="right: 12px;"/>
            </button>
        </x-slot:trigger>

        <x-dropdown-item
                href="/?{{ http_build_query(request()->except('category', 'page')) }}"
                :active="request()->routeIs('home') && request()->getQueryString() === null">All
        </x-dropdown-item>

        @foreach($categories as $category)
            <x-dropdown-item
                    :active="isset($currentCategory) && $currentCategory->is($category)"
                    href="/?category={{ $category->slug }}&{{ http_build_query(request()->except('category', 'page')) }}"
            >{{ ucwords($category->name) }}</x-dropdown-item>

        @endforeach
    </x-dropdown>
</div>

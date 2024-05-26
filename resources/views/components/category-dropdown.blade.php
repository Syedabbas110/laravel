<x-dropdown>
    <x-slot name="trigger">

        <button class="py-2 pl-3 pr-9 text-sm font-semibold w-full lg:w-32 text-left flex lg:inline-flex">

            {{ isset($currentCategory) ? $currentCategory->name : 'Categories' }}

            <x-icon name="down-arrow" class="absolute pointer-events-none" style="right: 12px;"/>

        </button>

    </x-slot>
 
    <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="request()->is('/')">
        All
    </x-dropdown-item>

    @foreach($categories as $category)
        @php 
            $link = "/?category=" . $category->slug . "&" . http_build_query(request()->except('category', 'page'));
        @endphp

        <x-dropdown-item
        href="{{ $link }}" 
        :active="request()->is($link)"
        > 
        {{ ucwords($category->name) }}
        </x-dropdown-item>

    @endforeach
</x-dropdown>

<header class="bg-gradient-to-r from-teal-500 to-blue-400 shadow-md sticky top-0 z-40" x-data="dropdown()">

    <div class="max-w-full mx-auto py-4 px-4 sm:px-6 lg:px-8 flex items-center h-16 justify-between md:justify-start">
        <a :class="{'text-teal-900' : open}" x-on:click="show()"
            class="text-white flex flex-col justify-center items-center order-first px-4 cursor-pointer">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8">
                <path d="M4 6h16M4 12h16M4 18h16">
                </path>
            </svg>
            <spam class="text-sm font-semibold hidden md:block">Categorias</spam>
        </a>

        <div class="flex-1 hidden md:block">@livewire('search-product') </div>

        <div class="hidden md:block">@livewire('dropdown-cart')</div>

        <div class="sm:hidden">@livewire('cart-mobil')</div>
        
    </div>
    

    <nav id="navigation-menu" :class="{'block': open, 'hidden': !open} "
        class="bg-gray-700 bg-opacity-25 w-full absolute hidden">

        {{-- Menu Computadora --}}

        <div class="max-w-7xl h-full relative hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full">
                <ul class="bg-gray-500 bg-opacity-60">

                    @foreach ($categories as $category)
                        <li
                            class="navigation-link hover:bg-teal-500 hover:text-white">
                            <a href="{{route('categories.show', $category)}}" class="py-4 px-4 text-sm flex items-center uppercase text-white italic">

                                <span class="flex justify-center w-9">
                                {!!$category->icon!!}
                                
                                </span>
                                {{ $category->name }}
                            </a>

                            <div class="navigation-submenu bg-gray-200 absolute w-3/4 h-full top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category" />
                            </div>

                        </li>
                    @endforeach

                </ul>

                <div class="col-span-3 bg-gray-200">
                    <x-navigation-subcategories :category="$categories->first()" />
                </div>

            </div>

        </div>

        {{-- Menu Dispositivos Mobiles --}}

        <div class="bg-white h-full overflow-y-auto"> 
            <div class="mx-auto pr-6 bg-gray-200 py-2 mb-2">
                @livewire('search-product')
            </div>
            <ul>
                @foreach ($categories as $category)
                    <li class=" hover:bg-teal-500 hover:text-white focus:outline-none transition duration-150">
                        <a href="{{route('categories.show', $category)}}" class="py-4 text-sm flex items-center">

                            <span class="flex justify-center w-9">
                                {!! $category->icon !!}
                            </span>
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
    </nav>

</header>

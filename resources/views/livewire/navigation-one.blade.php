<header class="bg-gradient-to-r from-blueGray-500 to-blue-400 shadow-md sticky top-0 z-40" x-data="dropdown()">

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

            class="bg-white w-full bg-opacity-30 absolute hidden">

        {{-- Menu Computadora --}}

        <div class="max-w-6xl h-full relative hidden md:block">
            <div x-on:click.away="close()" class="grid grid-cols-4 h-full">
                <ul class="bg-blueGray-500">

                    @foreach ($categories as $category)
                        <li class="navigation-link">

                            <a href="{{route('categories.show', $category)}}" class="mx-2 my-4 rounded-md bg-gradient-to-r from-blueGray-600 to-teal-600 shadow-lg  py-4 px-4 flex items-center text-white hover:bg-teal-700 hover:text-white ">

                                <span class="flex justify-center w-9">
                                {!!$category->icon!!}
                                
                                </span>
                                {{ $category->name }}
                            </a>

                            <div class="navigation-submenu bg-blueGray-100 absolute w-3/4 h-full top-0 right-0 hidden">
                                <x-navigation-subcategories :category="$category" />
                            </div>

                        </li>
                    @endforeach

                </ul>

                <div class="col-span-3 bg-blueGray-100">
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
                    <li class=" ">
                        <a href="{{route('categories.show', $category)}}" class="mx-2 my-4 rounded-md bg-gradient-to-r from-blueGray-500 to-teal-500 shadow-lg py-4 text-sm flex items-center hover:bg-teal-500 text-white hover:text-white focus:outline-none transition duration-150">

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

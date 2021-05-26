<div>
    <x-jet-dropdown width="96">
        <x-slot name="trigger">
            <span class="relative inline-block cursor-pointer">
                <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    viewBox="0 0 24 24" class="ml-6 h-8 w-8 object-cover text-white transform transition motion-reduce:transform-none hover:scale-125 duration-300">
                    <path
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                    </path>
                </svg>
                @if (Cart::count())
                    <span
                        class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-red-100 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full">{{ Cart::count() }}</span>
                @else
                    <span
                        class="absolute top-0 right-0 inline-block w-2 h-2 transform translate-x-1/2 -translate-y-1/2 bg-red-600 rounded-full"></span>
                @endif

            </span>
        </x-slot>

        <x-slot name="content">

            <ul>
                @forelse (Cart::content() as $item)
                    <li class="flex px-2 py-1">
                        <img class=" w-20 object-cover mr-4 rounded-md shadow-lg" src="{{ $item->options->image }}"
                            alt="">
                        <article class="flex-1">
                            <h1 class="font-bold">{{ $item->name }}</h1>
                            <div class="flex">
                                <p>Cant: {{ $item->qty }}</p>

                                @isset($item->options['color'])
                                <p class="mx-2">- Color: {{$item->options['color']}}</p>
                                @endisset

                                @isset($item->options['size'])
                                <p>{{$item->options['size']}}</p>
                                @endisset

                            </div>
                            <p>COP {{ $item->price }}</p>
                        </article>
                    </li>
                @empty
                    <li class="py-6 px-4">
                        <p class="text-center text-gray-500">No tiene agregado ningún Producto en el carrito</p>
                    </li>
                @endforelse
            </ul>

            @if (Cart::count())
                <div class="p-2 border-t border-gray-200 mt-4">
                    <p class="text-md text-gray-700"><span class="font-bold">Total: COP</span> {{ Cart::subtotal() }}
                    </p>

                    <x-button-enlace href="{{route('shopping-cart')}}" color="teal" class="w-full">
                        Ir al carrito de compras
                    </x-button-enlace>
                </div>
            @endif

        </x-slot>
    </x-jet-dropdown>
</div>

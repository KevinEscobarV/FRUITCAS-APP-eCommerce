<div class=" bg-contain bg-no-repeat bg-fixed min-h-screen" style="background-image:url('/img/fondo2-t.png');">
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-8">
    <section class="bg-white rounded-lg shadow-md text-gray-700">

        @if (Cart::count())

            <div class="flex items-center p-6 bg-gray-200 rounded-t-lg justify-between mb-8">

                <h1 class="text-lg font-semibold">CARRITO DE COMPRAS</h1>
                <a class="text-md cursor-pointer transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:text-orange-700"
                    wire:click="destroy">Vaciar Carrito
                    <i class="mx-1 fas fa-trash text-lg"></i>
                </a>
            </div>

            <div class="px-6 pb-4">
            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Cant</th>
                        <th>Total</th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>

                    @foreach (Cart::content() as $item)

                        <tr>
                            <td>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2 md:gap-2 items-center">
                                    <img class="h-15 w-20 object-cover rounded-md shadow-lg mr-4" src="{{ $item->options->image }}" alt="">
                                    <div>
                                        <p class="font-bold">{{ $item->name }}</p>

                                        @if ($item->options->color)
                                            <span>
                                                Color: {{ __($item->options->color) }}
                                            </span>
                                        @endif

                                        @if ($item->options->size)

                                            <span class="mx-1">-</span>

                                            <span>
                                                {{ $item->options->size }}
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </td>

                            <td class="text-center">
                                <span>COP {{ $item->price }}</span>

                            </td>

                            <td>
                                <div class="flex justify-center">
                                    @if ($item->options->size)

                                        @livewire('update-cart-item-size', ['rowId' => $item->rowId], key($item->rowId))

                                    @elseif($item->options->color)

                                        @livewire('update-cart-item-color', ['rowId' => $item->rowId],
                                        key($item->rowId))

                                    @else

                                        @livewire('update-cart-item', ['rowId' => $item->rowId], key($item->rowId))

                                    @endif
                                </div>
                            </td>

                            <td class="text-center">
                                COP {{ $item->price * $item->qty }}
                            </td>
                            <td class="text-center">
                                <a class="ml-6 cursor-pointer" wire:click="delete('{{ $item->rowId }}')"
                                    wire:loading.class="text-red-600 opacity-25"
                                    wire:target="delete('{{ $item->rowId }}')">
                                    <i
                                        class="fas fa-trash transition duration-300 ease-in-out transform hover:-translate-y-1 hover:scale-110 hover:text-orange-700"></i>
                                </a>
                            </td>
                        </tr>

                    @endforeach

                </tbody>
            </table>



        @else
            <div class="flex flex-col items-center pt-8">
                <x-cart />
                <p class="text-lg text-gray-700 mt-4">TU CARRITO DE COMPRAS ESTÁ VACÍO</p>

                <x-button-enlace href="/" class="mt-4 px-20 mb-8" color="orange">
                    Ir al inicio
                </x-button-enlace>
            </div>
        @endif

    </section>


    @if (Cart::count())

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mt-8">
            <div class="flex justify-between items-center">
                <div class="flex items-center">
                    <x-cart size="60"/>
                    <p class="ml-6 text-gray-700">
                        <span class="font-bold text-xl">Total:</span>
                        COP {{ Cart::subTotal() }}
                    </p>
                </div>

                <div class="mr-6">
                    <x-button-enlace href="{{ route('orders.create') }}" color="orange">
                        Continuar
                    </x-button-enlace>
                </div>
            </div>
        </div>

    @endif
</div>
</div>
</div>
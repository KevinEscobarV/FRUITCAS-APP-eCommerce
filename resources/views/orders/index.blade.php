<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Orden
            </div>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">

    <section class="grid lg:grid-cols-5 gap-6 text-white">
        <a href="{{ route('orders.index') . "?status=1" }}" class="bg-red-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
            <p class="text-center text-2xl">
                {{$pendiente}}
            </p>
            <p class="uppercase text-center">Pendiente</p>
            <p class="text-center text-2xl mt-2">
                <i class="fas fa-business-time"></i>
            </p>
        </a>

        <a href="{{ route('orders.index') . "?status=2" }}" class="bg-indigo-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
            <p class="text-center text-2xl">
                {{$recibido}}
            </p>
            <p class="uppercase text-center">Recibido</p>
            <p class="text-center text-2xl mt-2">
                <i class="fas fa-credit-card"></i>
            </p>
        </a>

        <a href="{{ route('orders.index') . "?status=3" }}" class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
            <p class="text-center text-2xl">
                {{$enviado}}
            </p>
            <p class="uppercase text-center">Enviado</p>
            <p class="text-center text-2xl mt-2">
                <i class="fas fa-truck"></i>
            </p>
        </a>

        <a href="{{ route('orders.index') . "?status=4" }}" class="bg-teal-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
            <p class="text-center text-2xl">
                {{$entregado}}
            </p>
            <p class="uppercase text-center">Entregado</p>
            <p class="text-center text-2xl mt-2">
                <i class="fas fa-check-circle"></i>
            </p>
        </a>

        <a href="{{ route('orders.index') . "?status=5" }}" class="bg-gray-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
            <p class="text-center text-2xl">
                {{$anulado}}
            </p>
            <p class="uppercase text-center">Anulado</p>
            <p class="text-center text-2xl mt-2">
                <i class="fas fa-times-circle"></i>
            </p>
        </a>
    </section>

    <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
        <h1 class="text-2xl mb-4">Mis Pedidos</h1>

        <ul>
            @foreach ($orders as $order)
                <li>
                    <a href="{{route('orders.show', $order)}}" class="flex items-center py-2 px-4 hover:bg-gray-100">
                        <span class="w-12 text-center">
                            @switch($order->status)
                                @case(1)
                                    <i class="fas fa-business-time text-red-500 opacity-50"></i>
                                    @break
                                @case(2)
                                    <i class="fas fa-credit-card text-indigo-500 opacity-50"></i>
                                    @break
                                @case(3)
                                    <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                                    @break
                                @case(4)
                                    <i class="fas fa-check-circle text-teal-500 opacity-50"></i>
                                    @break
                                @case(5)
                                    <i class="fas fa-times-circle text-gray-500 opacity-50"></i>
                                    @break
                                @default
                                    
                            @endswitch
                        </span>

                        <span>
                            Orden: {{$order->id}}
                            <br>
                            {{$order->created_at->format('d/m/Y')}}
                        </span>


                        <div class="ml-auto">
                            <span class="font-bold">
                                @switch($order->status)
                                    @case(1)
                                        
                                        Pendiente

                                        @break
                                    @case(2)
                                        
                                        Recibido

                                        @break
                                    @case(3)
                                        
                                        Enviado

                                        @break
                                    @case(4)
                                        
                                        Entregado

                                        @break
                                    @case(5)
                                        
                                        Anulado

                                        @break
                                    @default
                                        
                                @endswitch
                            </span>

                            <br>

                            <span class="text-sm">
                                {{$order->total}} COP
                            </span>
                        </div>

                        <span>
                            <i class="fas fa-angle-right ml-6"></i>
                        </span>

                    </a>
                </li>
            @endforeach
        </ul>
    </section>

    </div>

    <livewire:navigation-footer></livewire:navigation-footer>

</x-app-layout>
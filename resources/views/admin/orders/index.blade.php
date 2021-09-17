<x-admin-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path d="M16 11V7a4 4 0 00-8 0v4M5 9h14l1 12H4L5 9z">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Administración de Ordenes
            </div>
            <x-button-enlace color="orange" class="ml-auto" target="blank"
                href="{{ route('admin.ordenes.pdf') }}">
                Generar Reporte de Ordenes
            </x-button-enlace>
        </div>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-12">

        <section class="grid md:grid-cols-4 gap-6 text-white">

            <a href="{{ route('admin.orders.index') . '?status=2' }}"
                class="bg-indigo-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $recibido }}
                </p>
                <p class="uppercase text-center">Recibido</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-credit-card"></i>
                </p>
            </a>

            <a href="{{ route('admin.orders.index') . '?status=3' }}"
                class="bg-yellow-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $enviado }}
                </p>
                <p class="uppercase text-center">Enviado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-truck"></i>
                </p>
            </a>

            <a href="{{ route('admin.orders.index') . '?status=4' }}"
                class="bg-teal-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $entregado }}
                </p>
                <p class="uppercase text-center">Entregado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-check-circle"></i>
                </p>
            </a>

            <a href="{{ route('admin.orders.index') . '?status=5' }}"
                class="bg-gray-500 bg-opacity-75 rounded-lg px-12 pt-8 pb-4">
                <p class="text-center text-2xl">
                    {{ $anulado }}
                </p>
                <p class="uppercase text-center">Anulado</p>
                <p class="text-center text-2xl mt-2">
                    <i class="fas fa-times-circle"></i>
                </p>
            </a>
        </section>

        @if ($orders->count())
        <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <div class="border rounded-lg shadow-sm xl:col-span-2 p-4">
                  <canvas id="ChartBarVentas" width="400" height="400"></canvas>
                </div>
                <div class="border rounded-lg shadow-sm xl:col-span-2 p-4">
                  <canvas id="ChartDoughnutVentas" width="400" height="400"></canvas>
                </div>
              </div>
        </div>
            <section class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <h1 class="text-2xl mb-1">Pedidos recientes</h1>
                <p class="mb-4">En el siguiente listado no podrás administrar ni ver las ordenes pendientes por cuestiones de seguridad (Puedes verlas en el Reporte).</p>
                
                <ul>
                    @foreach ($orders as $order)
                        <li>
                            <a href="{{ route('admin.orders.show', $order) }}"
                                class="flex items-center py-2 px-4 hover:bg-gray-200 rounded-lg">

                                <span class="w-12 text-center">
                                    @switch($order->status)
                                        @case(1)
                                            <i class="fas fa-business-time text-red-500 opacity-50"></i>
                                        @break
                                        @case(2)
                                            <i class="fas fa-credit-card text-gray-500 opacity-50"></i>
                                        @break
                                        @case(3)
                                            <i class="fas fa-truck text-yellow-500 opacity-50"></i>
                                        @break
                                        @case(4)
                                            <i class="fas fa-check-circle text-pink-500 opacity-50"></i>
                                        @break
                                        @case(5)
                                            <i class="fas fa-times-circle text-green-500 opacity-50"></i>
                                        @break
                                        @default

                                    @endswitch
                                </span>

                                <span>
                                    Orden: {{ $order->id }}
                                    <br>
                                    {{ $order->created_at->format('d/m/Y') }}
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
                                        {{ $order->total }} COP
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

        @else
            <div class="bg-white shadow-lg rounded-lg px-12 py-8 mt-12 text-gray-700">
                <span class="font-bold text-lg">
                    No existe registros de ordenes
                </span>
            </div>
        @endif

        
    </div>

    @push('script')
    <script>
        var cantVentas;
        $.ajax({
        headers: {'X-CSRF-TOKEN': "{{ csrf_token() }}"},
        url: 'orders/chartVentas',
        method: 'POST',
        }).done(function(resVentas){     
            cantVentas = JSON.parse(resVentas);
            generarGraficaVentas();
        })
        </script>    
    @endpush
</x-admin-layout>

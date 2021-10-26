<x-app-layout>

    <x-slot name="header">
        <div class="flex items-center">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                viewBox="0 0 24 24" class="w-8 h-8 text-gray-500">
                <path d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                </path>
            </svg>
            <div class="ml-4 text-lg text-gray-500 leading-7 font-semibold">Orden : {{ $order->id }}
            </div>

            @if ($order->status <> 1 && $order->status <> 5)
            <x-button-enlace color="indigo" class="ml-auto" target="blank" href="{{ route('order.factura.pdf', $order) }}">
                Ver Factura
            </x-button-enlace> 
            @endif
           
        </div>
    </x-slot>

    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8 py-8">


        <div class="bg-white rounded-lg shadow-lg px-12 pt-8 pb-12 mb-6 flex items-center">

            <div class="relative">
                <div class="{{ ($order->status >= 2 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }}  rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-1.5 mt-0.5">
                    <p>Recibido</p>
                </div>
            </div>

            <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div>

            <div class="relative">
                <div class="{{ ($order->status >= 3 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-truck text-white"></i>
                </div>

                <div class="absolute -left-1 mt-0.5">
                    <p>Enviado</p>
                </div>
            </div>

            <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} h-1 flex-1 mx-2"></div>

            <div class="relative">
                <div class="{{ ($order->status >= 4 && $order->status != 5) ? 'bg-blue-400' : 'bg-gray-400' }} rounded-full h-12 w-12 flex items-center justify-center">
                    <i class="fas fa-check text-white"></i>
                </div>

                <div class="absolute -left-2.5 mt-0.5">
                    <p>Entregado</p>
                </div>
            </div>

        </div>

        @if ($order->efectivo <> NULL)
        <a href="{{$efectivo->transaction_details->external_resource_url}}" target="blank">
            <div class="bg-gradient-to-r from-gray-50 to-indigo-200 rounded-lg shadow-lg py-4 mb-6 flex justify-center items-center transform transition hover:scale-110 duration-300">
                <div class="px-6">
                    <h3 class=" text-lg text-center">Solo te falta pagar $ {{number_format(($efectivo->transaction_details->total_paid_amount), 0, '', '.')}} para completar tu compra</h3>
                    <h3 class="text-gray-700 text-center">Convenio</h3>
                    <p class="font-semibold text-center uppercase text-gray-700">{{$efectivo->payment_method_id}}</p>
                </div>
                <div class="px-6">
                    <h3 class="text-gray-700 text-center">Convenio No.</h3>
                    <p class="bg-gray-100 shadow-sm rounded-md font-semibold text-center uppercase text-gray-700">{{$efectivo->payment_method_id}}</p>

                    <h3 class="text-gray-700 text-center">Referencia</h3>
                    <p class="bg-gray-100 shadow-sm rounded-md font-semibold text-center uppercase text-gray-700">{{$efectivo->id}}</p>
                    
                    <p class="text-center">Tienes hasta el {{$efectivo->date_of_expiration}} para hacerlo.</p>
                
                </div>
            </div>
        </a>
        @endif
        
        
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6 flex items-center">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span>
                Orden-{{ $order->id }}</p>

               

            @if ($order->status == 1)
            
                <x-button-enlace class="ml-auto" href="{{route('orders.payment', $order)}}">
                    Ir a pagar
                </x-button-enlace>

            @endif
        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class=" text-lg font-semibold uppercase">Envío</p>

                    @if ($order->envio_type == 1)
                    <p>Los productos deben ser recogidos en tienda</p>
                    <p>FruitCas Tauramena Casanare Carrera 8 # 5 - 40 Barrio Palmarito</p>                      
                    @else
                    <p>Los productos seran enviados a:</p>
                    <p>{{{$envio->address}}}</p>
                    <p>{{$envio->department}} - {{$envio->city}} - {{$envio->district}}</p>
                    @endif

                </div>
                <div>
                    <p class=" text-lg font-semibold uppercase">Datos de contacto</p>
                    <p>Persona que recibirá el producto: {{$order->contact}}</p>
                    <p>Telefono de contacto: {{$order->phone}}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 text-gray-700 mb-6">
            <p class="text-xl font-semibold mb-4">Resumen</p>

            <table class="table-auto w-full">
                <thead>
                    <tr>
                        <th></th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">

                    @foreach ($items as $item)
                        <tr>
                            <td>
                                <div class="flex mb-2 mt-2">
                                    <img class="h-15 w-20 object-cover mr-4 rounded-md" 
                                        src="{{$item->options->image}}" alt="">
                                    <article>
                                        <h1 class="font-bold">{{$item->name}}</h1>
                                        <div class="flex text-xs">

                                            @isset ($item->options->color)
                                                Color: {{__($item->options->color)}}
                                            @endisset

                                            @isset ($item->options->size)
                                                - {{$item->options->size}}
                                            @endisset
                                        </div>
                                    </article>
                                </div>
                            </td>

                            <td class="text-center">
                                {{$item->price}} COP
                            </td>

                            <td class="text-center">
                                {{$item->qty}}
                            </td>

                            <td class="text-center">
                                {{$item->price * $item->qty}} COP
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>



    </div>
</x-app-layout>
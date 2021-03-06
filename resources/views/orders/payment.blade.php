<x-app-layout>

@php
        
    // SDK de Mercado Pago
    require base_path('vendor/autoload.php');

    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    $shipments = new MercadoPago\Shipments();

    $shipments->cost = $order->shipping_cost;
    $shipments->mode = "not_specified";

    $preference->shipments = $shipments;

    // Crea un ítem en la preferencia

    foreach ($items as $product) {
            $item = new MercadoPago\Item();
            $item->title = $product->name;
            $item->quantity = $product->qty;
            $item->unit_price = $product->price;
            $products[] = $item;
        }

    $preference->back_urls = array(

        "success" => route('orders.pay', $order),
        "failure" => route('orders.pay', $order),
        "pending" => route('orders.pay', $order),
    );
    $preference->auto_return = "approved";

    $preference->items = $products;
    $preference->save();

    
@endphp


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">

        <div class="bg-gradient-to-r from-gray-50 to-indigo-200 rounded-md shadow-md px-6 py-4 mb-6">
            <div class=" lg:flex items-center lg:justify-between">
                <img class="max-h-32" src="{{ asset('img/mercado_pago_1.png') }}" alt="">
                <div class="tracking-widest mt-6 text-gray-700 mr-6">

                    <p class="text-sm font-semibold text-right">
                        Subtotal: COP $ {{number_format(($order->total - $order->shipping_cost), 0, '', '.')}}
                    </p>
                    <p class="text-sm font-semibold text-right">
                        Envío: COP $  {{number_format(($order->shipping_cost), 0, '', '.')}}
                    </p>
                    <p class="text-lg font-semibold uppercase mb-2 text-right">
                        Total: COP $ {{number_format(($order->total), 0, '', '.')}}
                    </p>    

                </div>
            </div>
            <div class="cho-container lg:text-right mr-6 mb-4 md:text-left">
            </div>
        </div>

        <div class="bg-white rounded-md shadow-md px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span> Orden-{{$order->id}}</p>
        </div>

        <div class="bg-white rounded-md shadow-md px-6 py-4 mb-6">
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

        <div class="bg-white rounded-md shadow-md px-6 py-4 text-gray-700 mb-6">
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

    <script src="https://sdk.mercadopago.com/js/v2"></script>


    <script>
        // Agrega credenciales de SDK
          const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                locale: 'es-CO'
          });
        
          // Inicializa el checkout
          mp.checkout({
              preference: {
                  id: '{{ $preference->id }}'
              },
              render: {
                    container: '.cho-container', // Indica dónde se mostrará el botón de pago
                    label: 'Pagar', // Cambia el texto del botón de pago (opcional)
              }
        });
        </script>
    

</x-app-layout>
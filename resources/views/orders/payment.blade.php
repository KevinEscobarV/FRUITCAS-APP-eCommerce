<x-app-layout>

    @php
        
    // SDK de Mercado Pago
    require base_path('vendor/autoload.php');

    // Agrega credenciales
    MercadoPago\SDK::setAccessToken(config('services.mercadopago.token'));

    // Crea un objeto de preferencia
    $preference = new MercadoPago\Preference();

    // Crea un ítem en la preferencia

    foreach ($items as $product) {
            $item = new MercadoPago\Item();
            $item->title = $product->name;
            $item->quantity = $product->qty;
            $item->unit_price = $product->price;
            $products[] = $item;
        }

    $preference->items = $products;
    $preference->save();

    
    @endphp


    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <p class="text-gray-700 uppercase"><span class="font-semibold">Número de orden:</span> Orden-{{$order->id}}</p>
        </div>

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 mb-6">
            <div class="grid grid-cols-2 gap-6 text-gray-700">
                <div>
                    <p class=" text-lg font-semibold uppercase">Envío</p>

                    @if ($order->envio_type == 1)
                    <p>Los productos deben ser recogidos en tienda</p>
                    <p>FruitCas Tauramena Casanare Calle 6 # 9 - 58</p>                      
                    @else
                    <p>Los productos seran enviados a:</p>
                    <p>{{{$order->address}}}</p>
                    <p>{{$order->department->name}} - {{$order->city->name}} - {{$order->district->name}}</p>
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

        <div class="bg-white rounded-lg shadow-lg px-6 py-4 flex justify-between items-center">
            <img class="max-h-32" src="{{ asset('img/mercado_pago_1.jpg') }}" alt="">
            <div class="text-gray-700">
                <p class="text-sm font-semibold text-right">
                    Subtotal: COP {{$order->total - $order->shipping_cost}} 
                </p>
                <p class="text-sm font-semibold text-right">
                    Envío: COP {{$order->shipping_cost}} 
                </p>
                <p class="text-lg font-semibold uppercase mb-2">
                    Total: COP {{number_format(($order->total), 0, '', ',')}}
                </p>

                <div class="cho-container text-right">

                </div>

            </div>
        </div>


    </div>

    <script src="https://sdk.mercadopago.com/js/v2"></script>


    <script>
        // Agrega credenciales de SDK
          const mp = new MercadoPago("{{config('services.mercadopago.key')}}", {
                locale: 'es-AR'
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
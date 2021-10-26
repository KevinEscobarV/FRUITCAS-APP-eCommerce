<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte de Ordenes</title>
    <style>
        .table-head {
            height: 60px;
            background: #36304a;
            color: aliceblue;
        }

        .table {
            width: 100%;
        }

        .text-center {
            text-align: center;
        }      
        .inline {
            display: inline;
        }

    </style>
</head>

<body>

    <div>
        <img class="inline" src="{{ asset('img/logo-fruitcas.jpg') }}" alt="Logo" height="70px">
        <h1 class="inline"> / Ordenes</h1>
    </div>

    <P>Fecha de creacion del reporte: {{ $fecha }}</P>

    <table class="table">
        <thead class="table-head">
            <tr>
                <th>Fecha</th>
                <th>Numero de orden</th>
                <th>Contacto</th>
                <th>Tipo de envío</th>
                <th>Estado</th>
                <th>Costo de envío</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->created_at}}</td>
                    <td class="text-center">{{ $order->id }}</td>
                    <td>{{ $order->contact }}</td>
                    <td>
                        @switch($order->envio_type)
                            @case(1)
                                    <span>
                                        En Tienda
                                    </span>
                                @break
                            @case(2)
                                    <span>
                                        Domicilio
                                    </span>
                                @break
                            @default
                                
                        @endswitch
                    </td>
                    <td>
                        @switch($order->status)
                            @case(1)
                                <span>
                                    PENDIENTE
                                </span>
                            @break
                            @case(2)
                                <span>
                                    RECIBIDO
                                </span>
                            @break
                            @case(3)
                                <span>
                                    ENVIADO
                                </span>
                            @break
                            @case(4)
                                <span>
                                    ENTREGADO
                                </span>
                            @break
                            @case(5)
                                <span>
                                    ANULADO
                                </span>
                            @break
                            @default

                        @endswitch
                    </td>
                    <td>$ {{ number_format($order->shipping_cost, 0, '', '.') }}</td>
                    <td>$ {{ number_format($order->total, 0, '', '.') }}</td>
                    
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>

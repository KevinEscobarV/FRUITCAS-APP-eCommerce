<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Productos</title>
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
    </style>
</head>

<body>

    <div>
        <h1>FRUITCAS / Productos</h1>
        <P>Fecha de creacion del reporte: {{$fecha}}</P>
    </div>

    <table class="table">
        <thead class="table-head">
            <tr>
                <th>Fecha</th>
                <th>ID</th>
                <th>Name</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Estado</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->created_at}}</td>
                    <td class="text-center">{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>$ {{ number_format($product->price, 0, '', '.') }}</td>
                    <td class="text-center">{{ $product->quantity }}</td>
                    <td class="text-center">
                        @switch($product->status)
                            @case(1)
                                <span>
                                    Borrador
                                </span>
                            @break
                            @case(2)
                                <span>
                                    Publicado
                                </span>
                            @break
                            @default

                        @endswitch
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>

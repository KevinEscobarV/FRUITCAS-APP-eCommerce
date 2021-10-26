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
        .inline {
            display: inline;
        }

    </style>
</head>

<body>

    <div>
        <img class="inline" src="{{ asset('img/logo-fruitcas.jpg') }}" alt="Logo" height="70px">
        <h1 class="inline"> / Productos Registrados</h1>
    </div>

    <P>Fecha de creacion del reporte: {{ $fecha }}</P>

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

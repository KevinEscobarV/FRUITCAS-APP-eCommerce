<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Terceros</title>
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
        <h1 class="inline"> / Terceros</h1>
    </div>

    <P>Fecha de creacion del reporte: {{ $fecha }}</P>
    
    <table class="table">
        <thead class="table-head">
            <tr>
                <th>Fecha</th>
                <th>ID</th>
                <th>Marca</th>
                <th>Productos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $brand)
                <tr>
                    <td>{{ $brand->created_at}}</td>
                    <td class="text-center">{{ $brand->id }}</td>
                    <td>{{ $brand->name }}</td>
                    <td class="text-center">{{ $brand->products->count()}}</td>
                    
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>

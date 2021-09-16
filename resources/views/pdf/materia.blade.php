<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Materia Prima</title>
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
        <h1>FRUITCAS / Materia Prima</h1>
        <P>Fecha de creacion del reporte: {{$fecha}}</P>
    </div>

    <table class="table">
        <thead class="table-head">
            <tr>
                <th>Fecha</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Valor</th>
                <th>Cantidad</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($fruits as $fruit)
                <tr>
                    <td>{{ $fruit->created_at}}</td>
                    <td class="text-center">{{ $fruit->id }}</td>
                    <td>{{ $fruit->name }}</td>
                    <td>{{ $fruit->description }}</td>
                    <td>$ {{ number_format($fruit->price, 0, '', '.') }}</td>
                    <td>{{ $fruit->quantity }}</td>
                    <td>$ {{ number_format($fruit->price * $fruit->quantity , 0, '', '.') }}</td>
                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>

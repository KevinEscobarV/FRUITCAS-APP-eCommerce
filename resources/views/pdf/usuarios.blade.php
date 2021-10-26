<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Usuarios</title>
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
        <h1 class="inline"> / Usuarios Registrados</h1>
    </div>

    <P>Fecha de creacion del reporte: {{ $fecha }}</P>
    
    <table class="table">
        <thead class="table-head">
            <tr>
                <th>Fecha de Registro</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>E-mail</th>
                <th>Rol</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->created_at}}</td>
                    <td class="text-center">{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td class="text-center">{{$user->roles()->pluck('name')->join(', ')}}</td>    
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>

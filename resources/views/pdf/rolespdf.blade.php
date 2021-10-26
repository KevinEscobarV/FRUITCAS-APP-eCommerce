<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Roles</title>
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
        <h1 class="inline"> / Roles Registrados</h1>
    </div>

    <P>Fecha de creacion del reporte: {{ $fecha }}</P>

    <table class="table">
        <thead class="table-head">
            <tr>
                <th>Fecha de Registro</th>
                <th>ID</th>
                <th>Nombre</th>
                <th>Permisos ID</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($roles as $rol)
                <tr>
                    <td>{{ $rol->created_at }}</td>
                    <td class="text-center">{{ $rol->id }}</td>
                    <td>{{ $rol->name }}</td>
                    <td>{{ $rol->permissions()->pluck('id')->join(', ') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
 <hr>
    <h2>Permisos registrados en FruitcasApp</h2>
        <table class="table">
            
            <thead class="table-head">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($permissions as $per)
                    <tr>
                        <td class="text-center">{{ $per->id }}</td>
                        <td>{{ $per->name }}</td>
                        <td>{{ $per->description }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   
</body>

</html>

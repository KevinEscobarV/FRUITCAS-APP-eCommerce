<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Ubicaciones</title>
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
        
        .text-right {
            text-align: right;
            padding-right: 5px;
            padding-top: 10px;
            padding-bottom: 10px;
        }
        .inline {
            display: inline;
        }

    </style>
</head>

<body>

    <div>
        <img class="inline" src="{{ asset('img/logo-fruitcas.jpg') }}" alt="Logo" height="70px">
        <h1 class="inline"> / Ubicaciones de envio</h1>
    </div>

    <P>Fecha de creacion del reporte: {{ $fecha }}</P>
    
    <table class="table">
        <thead class="table-head">
            <tr>
                <th>ID</th>
                <th>Departamentos</th>
                <th>Ciudades/Municipios</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($locations as $location)
                <tr>
                    <td class="text-center">{{ $location->id}}</td>
                    <td>{{ $location->name}}</td>
                    <td>{{ $location->cities()->pluck('name')->join(', ') }}</td>                
                                     
                </tr>
            @endforeach

        </tbody>
    </table>

    <h2 class="text-center">Costos de envio</h2>

    <table class="table">
        <thead class="table-head">
            <tr>
                <th>ID</th>
                <th>Ciudades/Municipios</th>
                <th>Zonas/Barrios</th>
                <th>Costo de Envío</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cities as $city)
                <tr>
                    <td class="text-center">{{ $city->id}} </td>
                    <td>{{ $city->name}}</td>
                    <td>{{ $city->districts()->pluck('name')->join(', ') }}</td>
                    <td class="text-right">$ {{ number_format($city->cost, 0, '', '.') }}</td>          
                                     
                </tr>
            @endforeach

        </tbody>
    </table>
</body>
</html>

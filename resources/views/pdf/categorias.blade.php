<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte Categorias</title>
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
        <h1 class="inline"> / Categorias</h1>
    </div>

    <P>Fecha de creacion del reporte: {{ $fecha }}</P>

    <table class="table">
        <thead class="table-head">
            <tr>
                <th>Fecha</th>
                <th>ID</th>
                <th>Subcategorias</th>
                <th>Categoria</th>
                <th>Productos</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($subcategories as $subcategory)
                <tr>
                    <td>{{ $subcategory->created_at }}</td>
                    <td class="text-center">{{ $subcategory->id }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->category->name }}</td>
                    <td class="text-center">{{ $subcategory->products->count() }}</td>

                </tr>
            @endforeach

        </tbody>
    </table>
</body>

</html>

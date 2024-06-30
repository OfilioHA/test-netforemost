<!DOCTYPE html>
<html>

<head>
    <title>Reporte Alojamientos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>

<body>
    <h1>Reporte Alojamientos</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Precio Mt2</th>
                <th>Anunciante</th>
                <th>Fecha Registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                <td>{{ $row->original_id }}</td>
                <td>{{ $row->price }}</td>
                <td>{{ $row->title }}</td>
                <td>{{ $row->meter_price }}</td>
                <td>{{ $row->advertiser }}</td>
                <td>{{ $row->register_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
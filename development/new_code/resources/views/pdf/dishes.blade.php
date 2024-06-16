<!DOCTYPE html>
<html>
<head>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
    <title>Pdf</title>
</head>
<body>
@foreach($dishesByType as $typeId => $dishes)
    <h2>{{ $dishes->first()->type->type }}</h2>
    <table>
        <tr>
            <th>Menunummer / Toevoeging</th>
            <th>Naam</th>
            <th>Prijs</th>
            <th>Beschrijving</th>
        </tr>
        @foreach($dishes as $dish)
            <tr>
                <td>{{ $dish->menu_number ?? $dish->addition->letter }}</td>
                <td>{!! $dish->name !!}</td>
                <td>{{ $dish->price }}</td>
                <td>{{ $dish->description }}</td>
            </tr>
        @endforeach
    </table>
@endforeach
</body>
</html>

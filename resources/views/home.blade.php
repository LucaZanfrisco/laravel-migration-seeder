<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    @vite('resources/js/app.js')
</head>

<body class="container">
    <ul>
        @foreach ($trains as $train)
            <li class="card p-4">
                <h3>{{ $train->id }}</h3>
                <div>{{ $train->company}}</div>
                <div>Stazione di partenza: {{ $train->departure_station }}</div>
                <div>Stazione di arrivo: {{ $train->arrival_station }}</div>
                <div>Data di partenza: {{ $train->departure_time }}</div>
                <div>Data di arrivo: {{ $train->arrival_time }}</div>
                <div>Numero di vagoni: {{ $train->n_carriages }}</div>
                <div class="{{ ($train->on_time) ? 'text-success' : 'text-danger'}}">{{ ($train->on_time) ? 'In Orario' : 'In Ritardo' }}</div>  
                <div>{{ ($train->is_deleted) ? 'Cancellato' : '' }}</div>  
            </li>
        @endforeach   
    </ul>
    
</body>

</html>

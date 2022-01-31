<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/pdfStyles.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/style.css') }}" type="text/css"> --}}
    {{-- <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css
    " /> --}}
    <title>PDF | Inicidentes</title>

</head>

<body>
    <img class="navbar-brand-full app-header-logo" src="{{ asset('assets/logo.png') }}" width="65"
             alt="Systemar">
    <div class="pdf-titulo">
        Reporte de incidentes
    </div>
    <table>
        <thead class="cabecera">
            <tr>
                <th>Vehiculo</th>
                <th>Conductor</th>
                <th>Fecha</th>
                <th>Importancia</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody class="celdas">
            @foreach ($incidentes as $incidente)
                <tr>
                    <td>{{ $incidente->vehiculosI->NombreVehiculo }}</td>
                    <td>{{ $incidente->conductoresI->NombreConductor }}</td>
                    <td>{{ $incidente->Fecha_reporte }}</td>
                    <td>{{ $incidente->importancia }}</td>
                    <td>{{ $incidente->detallada }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="titulo">
     Total de Incidentes Vehiculos
    </div>
        <table>
            <thead class="cabecera">
                <tr>
                    <th>Vehiculo</th>
                    <th>Total de Incidentes</th>
                </tr>
            </thead>
            <tbody class="celdas">
                @foreach ($vehiculos as $vehiculo)
                <tr>
                    <td>{{$vehiculo->NombreVehiculo}}</td>
                    <td>{{$vehiculo->total}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>


<div class="titulo">
   Total de Incidentes Conductores
</div>
    <table>
        <thead class="cabecera">
            <tr>
                <th>Conductor</th>
                <th>Total de Incidentes</th>
            </tr>
        </thead>
        <tbody class="celdas">
            @foreach ($recurrentes as $recurrente)
            <tr>
                <td>{{$recurrente->NombreConductor}}</td>
                <td>{{$recurrente->total}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>


</html>

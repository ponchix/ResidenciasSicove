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
    <title>PDF | Gastos </title>

</head>

<body>
    <img class="navbar-brand-full app-header-logo" src="{{ asset('assets/logo.png') }}" width="65"
             alt="Systemar">
    <div class="pdf-titulo">
        Reporte de Gastos
    </div>
    <table>
        <thead class="cabecera">
            <tr>
                <th>Fecha</th>
                <th>Concepto </th>
                <th>Monto</th>
                <th>Vehículo</th>
                <th>Conductor</th>
                <th>Proveedor</th>
            </tr>
        </thead>
        <tbody class="celdas">
            @foreach ($gastos as $gasto)
                <tr>
                    <td>{{ $gasto->fecha}}</td>
                    <td>{{ $gasto->concepto }}</td>
                    <td>{{ $gasto->monto }}</td>
                    <td>{{ $gasto->vehiculo}}</td>
                    <td>{{ $gasto->conductor }}</td>
                    <td>{{ $gasto->proveedor}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="titulo">
     Total de Vehiculos
    </div>
        <table>
            <thead class="cabecera">
                <tr>
                    <th>Vehiculo</th>
                    <th>Total de vehiculos</th>
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
           


</body>


</html>

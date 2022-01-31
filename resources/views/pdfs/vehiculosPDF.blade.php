<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="Last-Modified" content="0">
    <meta http-equiv="Cache-Control" content="no-cache, mustrevalidate">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ public_path('assets/pdfStyles.css') }}" type="text/css">
    {{-- <link rel="stylesheet" href="{{ asset('assets/style.css') }}" type="text/css"> --}}
    {{-- <link href="{{ public_path('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css
    " /> --}}
    <title>PDF | Vehiculos</title>

</head>

<body>
    <img class="navbar-brand-full app-header-logo" src="{{ asset('assets/logo.png') }}" width="65"
             alt="Systemar">
    <div class="pdf-titulo">
       Reporte de vehiculos
    </div>
    <table class="table">
        <thead class="cabecera" >
            <tr>
                <th>Vehiculo</th>
                <th>Marca</th>
                <th>Modelo</th>
                <th>Placa</th>
                <th>Fecha Compra</th>
                <th>Ven. Poliza</th>
            </tr>
        </thead>
        <tbody class="celdas">
            @foreach ($vehiculos as $vehiculo)
                <tr>

                    <td>{{ $vehiculo->NombreVehiculo }}</td>
                    <td>{{ $vehiculo->marcasVehiculo->marca }}</td>
                    <td>{{ $vehiculo->modelosVehiculo->modelo }}</td>
                    <td>{{ $vehiculo->Placa }}</td>
                    <td>{{ $vehiculo->fecha_compra }}</td>
                    <td>{{ $vehiculo->fecha_poliza }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="titulo">
        Lista de vehiculos por status
    </div>
    <table>
        <thead class="cabecera">
            <tr>
                <th>Detalle</th>
                <th>Cantidad</th>
            </tr>

        </thead>
        <tbody class="celdas">
            <tr>
                <td>Disponibles</td>
                <td>{{ $disponible }}</td>
            </tr>
            <tr>
                <td>Asignados</td>
                <td>{{ $asignado }}</td>
            </tr>
            <tr>
                <td>Taller/Mantenimiento</td>
                <td>{{ $taller }}</td>
            </tr>

            <tr>
                <td>Fuera de Servicio</td>
                <td>{{ $fuera }}</td>
            </tr>
        </tbody>
    </table>
    <div class="titulo">
        Lista de vehiculos por compañia de seguros
    </div>

    <table>
        <thead class="cabecera">
            <tr>
                <th>Vehiculo</th>
                <th>Compañia de seguros</th>

            </tr>
        </thead>
        <tbody class="celdas">
            @foreach ($seguros as $seguro)
                <tr>
                    <td>{{ $seguro->NombreVehiculo }}</td>
                    <td>{{ $seguro->CompaniaSeguros }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <div class="titulo">
        Polizas
    </div>

    <table>
        @foreach ($polizas as $poliza => $vehiculos)
            <tr>
                <th class="pol">Fecha de Vencimiento: {{ $poliza }}</th>
                <th class="pol">Compañia</th>
            </tr>
            @foreach ($vehiculos as $vehiculo)
                <tr>
                    <td class="celdas">{{ $vehiculo->NombreVehiculo }}</td>
                    <td  class="celdas">{{ $vehiculo->CompaniaSeguros }}</td>
                </tr>
            @endforeach
        @endforeach
    </table>


    <table class="total-veh">
        <tr>
            <th class="total-body">Total de vehiculos</th>
            <td>{{ $total }}</td>
        </tr>

    </table>
</body>

</html>

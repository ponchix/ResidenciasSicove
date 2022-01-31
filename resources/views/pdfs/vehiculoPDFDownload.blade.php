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
    <title>PDF | Vehiculos</title>

</head>

<body>
    <div class="pdf-titulo">
        Lista de vehiculos
    </div>
    <table class="table">
        <thead class="total-body">
            <tr>
                <th >Vehiculo</th>
                <th >Marca</th>
                <th >Modelo</th>
                <th >Placa</th>
                <th >Fecha Compra</th>
                <th>Seguro</th>
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
                    <td>{{ $vehiculo->CompaniaSeguros }}</td>
                    <td>{{ $vehiculo->fecha_poliza }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <div class="titulo">
        Lista de vehiculos por status
    </div>
    <table class="status-pdf">
        <thead class="cabecera">
            <tr>
                <th >Detalle</th>
                <th>Cantidad</th>
            </tr>

        </thead>
        <tbody class="celdas">
            <tr>
                <td class="total text-center">Disponible</td>
                <td class="total text-center">{{ $disponible }}</td>
            </tr>
            <tr>
                <td class="total text-center">Asignados</td>
                <td class="total text-center">{{ $asignado }}</td>
            </tr>
            <tr>
                <td class="total text-center">Taller</td>
                <td class="total text-center">{{ $taller }}</td>
            </tr>

            <tr>
                <td class="total text-center">Fuera de Servicio</td>
                <td class="total text-center">{{ $fuera }}</td>
            </tr>
        </tbody>
    </table>
    <div class="titulo">
        Lista de vehiculos por compañia de seguros
    </div>

    <table >
        <thead class="cabecera">
            <tr>
                <th>Vehiculo</th>
                <th>Compañia de seguros</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($seguros as $seguro)
            <tr>
                <td>{{$seguro->NombreVehiculo}}</td>
                <td>{{$seguro->CompaniaSeguros}}</td>
            </tr>
            @endforeach
                   </tbody>
    </table>

    <table class="total-veh">
        <tr >
            <th class="total-body">Total de vehiculos</th>
            <td>{{$total}}</td>
        </tr>

</table>
</body>

</html>

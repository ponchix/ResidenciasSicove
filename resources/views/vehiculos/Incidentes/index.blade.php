<title>Incidentes</title>
@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Incidentes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a href="{{ route('incidentes.create') }}" class="btn btn-outline-primary btn-lg"><i
                                    class="fas fa-plus"> </i>Registrar</a>
                            <a href="{{ route('vehiculos.index') }}" class="btn btn-outline-primary btn-lg"><i
                                    class="fas fa-car"></i>Vehiculos</a>
                            <div class="titulo">Tabla de Incidentes</div>
                            @include('vehiculos/Incidentes.DatatableIncidente')
                        </div>
                        <div class="titulo">Gráfica</div>
                        <div class="container">

                        </div>
                        <div id="container">

                        </div>


                        <div>


                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
@section('js')
@if (session('add')=='agregar')
<script>
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Incidente Registrado',
  showConfirmButton: false,
  timer: 1000,
  heightAuto:false,
})
</script>
    
@endif

@if (session('mensaje')=='ok')
<script>
Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'El Incidente ha sido eliminado',
    showConfirmButton: false,
    timer: 1500
  }) 
</script>
@endif
@endsection
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var datas = <?php echo json_encode($datas); ?>;



        const chart = Highcharts.chart('container', {
            chart: {
                type: 'area',
                options3d: {
                    enabled: true,
                    alpha: 10,
                    beta: 25,
                    depth: 70,
                }
            },
            title: {
                text: 'Total de Incidentes'
            },
            plotOptions: {
                series: {
                    allowPointSelect: true
                },
                area: {
                    depth: 100
                }
            },
            xAxis: {
                title: {
                    text: 'Total'
                },
                categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct',
                    'Nov', 'Dic'
                ]
            },
            yAxis: {
                title: {
                    text: 'Incidentes registrados'
                }

            },
            series: [{
                name: 'Incidentes',
                data: datas

            }]
        });
    });
</script>

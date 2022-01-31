<title>Conductor | {{$conductor->NombreConductor}}</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Información Conductor</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                     <a href="{{route('conductores.index')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-chevron-left"></i> Atrás</a><br>
                    <div class="row">
                    <div class="col-md-3 col-xs-3 col-xs-3">
                    <div class="titulo">Perfil</div>
                        <img src="/conductor/{{$conductor->imagen}}"  width="100%" height="75%">
                    </div>
                    <div class="col-md-6 col-xs-5 col-xs-5">
                            <div class="titulo">Información Basica</div>
                            <table class="table">
                                <tbody>
                                <tr><th scope="row" class="text-left">Nombre</th>
                                <td class="text-right">{{$conductor->NombreConductor}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Apellido Paterno</th>
                                <td class="text-right"> {{$conductor->APaterno}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Apellido Materno</th>
                                <td class="text-right">{{$conductor->AMaterno}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Edad</th>
                                <td class="text-right"> {{$conductor->edad}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Direccion</th>
                                <td class="text-right">{{$conductor->direccion}}</td>
                                </tr>
                                </tbody>
                            </table>
                    </div>
                    <div class="col-md-3 col-xs-4 col-xs-4">
                        <div class="titulo">Info. Licencia</div>
                            <table class="table" >
                                <tbody>
                                 <tr><th scope="row" class="text-left">No.Licencia</th>
                                     <td class="text-right">{{$conductor->NoLiciencia}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Fecha de Expiración</th>
                                    <td class="text-right">{{$conductor->fecha_exp}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Tipo de  Licencia</th>
                                    <td class="text-right">{{$conductor->tipoLicencia}}</td>
                                </tr>
                                <tr><th scope="row" class="text-left">Status</th>
                                    <td class="text-right">{{$conductor->estado->status}}</td>
                                </tr>
                                </tbody>
                            </table> 
                    </div>           
                    <div class="col-md-12 col-xs-12 col-xs-12">
                        <div class="titulo">Asignaciones</div>    
<div class="table-responsive">
    @include('conductores.DataTableAsignacion')
</div>
                   </div>
                   </div>

         </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection
<title>Mecanico | {{$mecanico->NombreMecanico}}</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Información del Mecanico</h3>
    </div>
    <div class="section-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                         <a href="{{route('mecanico.index')}}" class="btn btn-outline-primary btn-lg"><i class="fas fa-chevron-left"></i> Atrás</a><br>
                        <div class="row">
                        <div class="col-md-4 col-xs-4 col-xs-4">
                        <div class="titulo">Perfil</div>
                          <div align="center"><img src="/mecanicos/{{$mecanico->imagen}}"  width="80%" height="75%" align="form-control" ></div>
                      </div>
                        <div class="col-md-8 col-xs-8 col-xs-8">
                            <div class="titulo">Información Basica</div>
                            <table class="table">
                                <tbody>
                                    <tr><th scope="row" class="text-left">Nombre</th>
                                        <td class="text-right">{{$mecanico->NombreMecanico}}</td>
                                    </tr>
                                    <tr><th scope="row" class="text-left">Apellido Paterno</th>
                                        <td class="text-right"> {{$mecanico->APaterno}}</td>
                                    </tr>
                                    <tr><th scope="row" class="text-left">Apellido Materno</th>
                                        <td class="text-right">{{$mecanico->AMaterno}}</td>
                                    </tr>
                                    <tr><th scope="row" class="text-left">Edad</th>
                                        <td class="text-right"> {{$mecanico->edad}}</td>
                                    </tr>
                                    <tr><th scope="row" class="text-left">Direccion</th>
                                        <td class="text-right"> {{$mecanico->direccion}}</td>
                                    </tr>
                                    <tr><th scope="row" class="text-left">Telefono</th>
                                         <td class="text-right"> {{$mecanico->telefono}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div> 

                        </div>
        </div>
    </div>
</div>
</section>
@endsection
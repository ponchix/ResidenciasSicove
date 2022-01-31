<title>Reportes</title>
@extends('layouts.app')
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Reportes</h3>
        </div>
        <div class="section-body">
            <div class="row align-items-center">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if (session()->has('alert-danger'))
                            <div class="alert alert-danger">
                                {{ session()->get('alert-danger') }}
                            </div>
                        @endif
                            <div class="titulo">
                                Reportes Modulo Vehiculos
                            </div>
                            <div class="row">
                                <div class="col-md-2 col-xl-6">
                                    <div class="card bg-c-pdf order-card">
                                        <div class="card-block">
                                            <h4>Reporte de incidentes</h4>
                                            <h2 class="text-right"> <i class="fas fa-file-pdf  f-left"></i></h2>
                                            <div class="dropdown">
                                                <button class="btn btn-pdf dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li class="item-pdf"><a class="dropdown-item-pdf" href="{{route('reportes.incidentePDF')}}" target="_blank">Ver
                                                            PDF</a></li>
                                                    <li class="item-pdf"><a class="dropdown-item-pdf"
                                                            href="{{route('reportes.DonwloadPDF')}}">Descargar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-2 col-xl-6">
                                    <div class="card bg-c-pdf order-card">
                                        <div class="card-block">
                                            <h4>Reporte de gastos</h4>
                                            <h2 class="text-right"> <i class="fas fa-file-pdf  f-left"></i></h2>
                                            <div class="dropdown">
                                                <button class="btn btn-pdf dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li class="item-pdf"><a class="dropdown-item-pdf" href="{{route('reportes.gastosPDF')}}"target="_blank">Ver
                                                            PDF</a></li>
                                                    <li class="item-pdf"><a class="dropdown-item-pdf"
                                                            href="#">Descargar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="col-md-2 col-xl-6">
                                    <div class="card bg-c-pdf order-card">
                                        <div class="card-block">
                                            <h4>Reporte de combustible</h4>
                                            <h2 class="text-right"> <i class="fas fa-file-pdf  f-left"></i></h2>
                                            <div class="dropdown">
                                                <button class="btn btn-pdf dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li class="item-pdf"><a class="dropdown-item-pdf" href="#">Ver
                                                            PDF</a></li>
                                                    <li class="item-pdf"><a class="dropdown-item-pdf"
                                                            href="#">Descargar</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div> --}}

                                <div class="col-md-2 col-xl-6">
                                    <div class="card bg-c-pdf order-card">
                                        <div class="card-block">
                                            <h4>Reporte de vehiculos</h4>
                                            <h2 class="text-right"> <i class="fas fa-file-pdf  f-left"></i></h2>
                                            <div class="dropdown">
                                                <button class="btn btn-pdf dropdown-toggle" type="button"
                                                    id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    Opciones
                                                </button>
                                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                    <li class="item-pdf"><a class="dropdown-item-pdf"
                                                            href="{{ route('vehiculos.pdf') }}" target="_blank">Ver
                                                            PDF</a></li>
                                                    <li class="item-pdf"><a class="dropdown-item-pdf"
                                                            href="{{ route('vehiculos.DownloadPDF') }}">Descargar</a></li>
                                                </ul>
                                            </div>
                                        </div>
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

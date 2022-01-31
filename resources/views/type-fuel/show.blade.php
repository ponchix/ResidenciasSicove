@extends('layouts.app')

@section('template_title')
    {{ $typeFuel->name ?? 'Show Type Fuel' }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Type Fuel</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('type-fuels.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo Combustible:</strong>
                            {{ $typeFuel->tipo_combustible }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

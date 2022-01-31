<title>Archivados</title>
@extends('layouts.app')
@section('content')
<section class="section">
    <div class="section-header">
        <h3 class="page__heading">Asignaciones Archivadas</h3>
    </div>
    <div class="section-body">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body" >
                       <div class="table-responsive">
                        @include('asignaciones.DatatableArchivados')
                       </div>
                      
             </div>
         </div>
     </div>
 </div>
</div>
</section>
@endsection
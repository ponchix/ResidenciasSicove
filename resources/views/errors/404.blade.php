@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Pagina No Encontrada'))
@section('boton')
<a href="/home" class="btn-outline-primary medium radius">Home</a>
@endsection
    


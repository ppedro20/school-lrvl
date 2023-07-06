@extends('layout')
@section('header-title', "Consultar $curso->nome")
@section('main')
    <h2>Curso {{ $curso->nome }}</h2>
    <div>
        @include('cursos.shared.fields', ['readonlyData' => true])
    </div>
@endsection




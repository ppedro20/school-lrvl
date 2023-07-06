@extends('layout')
@section('header-title', "Consultar $disciplina->nome")
@section('main')
    <div>
        @include('disciplinas.shared.fields', ['readonlyData' => true])
    </div>
@endsection

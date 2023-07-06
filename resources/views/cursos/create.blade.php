@extends('layout')
@section('header-title', 'Criar novo curso')
@section('main')
    <h2>Novo Curso</h2>
    <form method="POST" action="{{ route('cursos.store') }}">
        @csrf
        @include('cursos.shared.fields')
        <div>
        <button type="submit" name="ok">Guardar novo curso</button>
        </div>
        </form>
@endsection

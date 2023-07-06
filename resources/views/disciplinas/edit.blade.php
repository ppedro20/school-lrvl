@extends('layout')
@section('header-title', "Editar $disciplina->nome")
@section('main')
    <form method="POST" action="{{ route('disciplinas.update', ['disciplina' => $disciplina]) }}">
        @csrf
        @method('PUT')
        @include('disciplinas.shared.fields')
        <div>
            <button type="submit" name="ok">Guardar disciplina</button>
        </div>
    </form>
@endsection

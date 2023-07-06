@extends('layout')
@section('header-title', "Alterar $curso->nome")
@section('main')
    <form method="POST" action="{{ route('cursos.update', ['curso' => $curso]) }}">
        @csrf
        @method('PUT')
        @include('cursos.shared.fields')
        <div>
            <button type="submit" name="ok">Guardar curso</button>
        </div>
    </form>
@endsection

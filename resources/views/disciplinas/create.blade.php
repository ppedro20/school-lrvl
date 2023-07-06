@extends('layout')
@section('header-title', 'Criar nova disciplina')
@section('main')
    <form method="POST" action="{{ route('disciplinas.store') }}">
        @csrf
        @include('disciplinas.shared.fields')
        <div>
            <button type="submit" name="ok">Guardar nova disciplina</button>
        </div>
    </form>
@endsection

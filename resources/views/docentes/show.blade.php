@extends('layout')

@section('titulo', 'Docente')

@section('subtitulo')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Gestão</li>
        <li class="breadcrumb-item">Curricular</li>
        <li class="breadcrumb-item"><a href="{{ route('docentes.index') }}">Docentes</a></li>
        <li class="breadcrumb-item"><strong>{{ $docente->user->name }}</strong></li>
        <li class="breadcrumb-item active">Consultar</li>
    </ol>
@endsection

@section('main')
    <div>
        <div class="d-flex flex-column flex-sm-row justify-content-start align-items-start">
            <div class="flex-grow-1 pe-2">
                @include('users.shared.fields', ['user' => $docente->user, 'readonlyData' => true])
                @include('docentes.shared.fields', ['docente' => $docente, 'readonlyData' => true])
                <div class="my-1 d-flex justify-content-end">
                    <form method="POST" action="{{ route('docentes.destroy', ['docente' => $docente]) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" name="delete" class="btn btn-danger">
                            Apagar Docente
                        </button>
                    </form>
                    <a href="{{ route('docentes.edit', ['docente' => $docente]) }}" class="btn btn-secondary ms-3">
                        Alterar Docente
                    </a>
                </div>
            </div>
            <div class="ps-2 mt-5 mt-md-1 d-flex mx-auto flex-column align-items-center justify-content-between"
                style="min-width:260px; max-width:260px;">
                @include('users.shared.fields_foto', [
                    'user' => $docente->user,
                    'allowUpload' => false,
                ])
            </div>
        </div>
    </div>
    <div>
        <h3>Disciplinas que leciona</h3>
        @include('disciplinas.shared.table', [
            'disciplinas' => $docente->disciplinas,
            'showCurso' => true,
            'showDetail' => true,
            'showEdit' => false,
            'showDelete' => false,
        ])
    </div>
@endsection

@extends('layout')

@section('titulo', 'Departamento')

@section('subtitulo')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Gestão</li>
        <li class="breadcrumb-item">Recursos Humanos</li>
        <li class="breadcrumb-item"><a href="{{ route('departamentos.index') }}">Departamentos</a></li>
        <li class="breadcrumb-item"><strong>{{ $departamento->nome }}</strong></li>
        <li class="breadcrumb-item active">Consultar</li>
    </ol>
@endsection

@section('main')
    <div>
        @include('departamentos.shared.fields', ['readonlyData' => true])
    </div>
    <div class="my-4 d-flex justify-content-end">
        <form method="POST" action="{{ route('departamentos.destroy', ['departamento' => $departamento]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" name="delete" class="btn btn-danger">
                Apagar Departamento
            </button>
        </form>
        <a href="{{ route('departamentos.edit', ['departamento' => $departamento]) }}"
            class="btn btn-secondary ms-3">Alterar
            Departamento</a>
    </div>
    <div>
        <h3>Docentes do departamento</h3>
        @include('docentes.shared.table', [
            'docentes' => $departamento->docentes,
            'showFoto' => true,
            'showDepartamento' => false,
            'showContatos' => true,
            'showDetail' => true,
            'showEdit' => false,
            'showDelete' => false,
        ])
    </div>
@endsection

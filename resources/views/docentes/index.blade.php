@extends('layout')

@section('titulo', 'Docentes')

@section('subtitulo')
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Gestão</li>
        <li class="breadcrumb-item">Curricular</li>
        <li class="breadcrumb-item active">Docentes</li>
    </ol>
@endsection

@section('main')
    <p><a class="btn btn-success" href="{{ route('docentes.create') }}"><i class="fas fa-plus"></i> &nbsp;Criar novo
            docente</a></p>
    <hr>
    <form method="GET" action="{{ route('docentes.index') }}">
        <div class="d-flex justify-content-between">
            <div class="flex-grow-1 pe-2">
                <div class="d-flex justify-content-between">
                    <div class="flex-grow-1 mb-3 form-floating">
                        <select class="form-select" name="departamento" id="inputDepartamento">
                            <option {{ old('departamento', $filterByDepartamento) === '' ? 'selected' : '' }}
                                value="">Todos Departamentos </option>
                            @foreach ($departamentos as $departamento)
                                <option
                                    {{ old('departamento', $filterByDepartamento) == $departamento->abreviatura ? 'selected' : '' }}
                                    value="{{ $departamento->abreviatura }}">{{ $departamento->nome }}</option>
                            @endforeach
                        </select>
                        <label for="inputDepartamento" class="form-label">Departamento</label>
                    </div>
                </div>
                <div class="d-flex justify-content-between">
                    <div class="mb-3 me-2 flex-grow-1 form-floating">
                        <input type="text" class="form-control" name="nome" id="inputNome"
                            value="{{ old('nome', $filterByNome) }}">
                        <label for="inputNome" class="form-label">Nome</label>
                    </div>
                </div>
            </div>
            <div class="flex-shrink-1 d-flex flex-column justify-content-between">
                <button type="submit" class="btn btn-primary mb-3 px-4 flex-grow-1" name="filtrar">Filtrar</button>
                <a href="{{ route('docentes.index') }}" class="btn btn-secondary mb-3 py-3 px-4 flex-shrink-1">Limpar</a>
            </div>
        </div>
    </form>
    @include('docentes.shared.table', [
        'docentes' => $docentes,
        'showFoto' => true,
        'showContatos' => true,
        'showDetail' => true,
        'showEdit' => true,
        'showDelete' => true,
    ])
    <div>
        {{ $docentes->withQueryString()->links() }}
    </div>
@endsection

@extends('layout')
@section('header-title', 'Lista de Cursos')
@section('main')
    <p>
        <a class="btn btn-success" href="{{ route('cursos.create') }}"><i class="fas fa-plus"></i> Criar novo curso</a>
    </p>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Abreviatura</th>
                <th>Nome</th>
                <th>Tipo</th>
                <th>Nº Semestres</th>
                <th>Nº Vagas</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cursos as $curso)
                <tr>
                    <td>{{ $curso->abreviatura }}</td>
                    <td>{{ $curso->nome }}</td>
                    <td>{{ $curso->tipo }}</td>
                    <td>{{ $curso->semestres }}</td>
                    <td>{{ $curso->vagas }}</td>
                    <td>
                        <a class="btn btn-secondary" href="{{ route('cursos.show', ['curso' => $curso]) }}"><i class="fas fa-eye"></i>Consultar</a>
                    </td>
                    <td>
                        <a class="btn btn-dark" href="{{ route('cursos.edit', ['curso' => $curso]) }}"><i class="fas fa-edit"></i>Alterar</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('cursos.destroy', ['curso' => $curso]) }}">
                            @csrf
                            @method('DELETE')

                            <button type="submit" name="delete" class="btn btn-danger"><i class="fas fa-trash"></i>Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

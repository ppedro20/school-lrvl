@extends('layout')
@section('header-title', 'Lista de Disciplinas')
@section('main')
    <p><a href="{{ route('disciplinas.create') }}">Criar nova disciplina</a></p>
    <table>
        <thead>
            <tr>
                <th>Abreviatura</th>
                <th>Nome</th>
                <th>Curso</th>
                <th>Ano</th>
                <th>Semestre</th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($disciplinas as $disciplina)
                <tr>
                    <td>{{ $disciplina->abreviatura }}</td>
                    <td>{{ $disciplina->nome }}</td>
                    <td>{{ $disciplina->curso }}</td>
                    <td>{{ $disciplina->ano }}</td>
                    <td>{{ $disciplina->semestre }}</td>
                    <td><a href="{{ route('disciplinas.show', ['disciplina' => $disciplina]) }}">Consultar</a></td>
                    <td><a href="{{ route('disciplinas.edit', ['disciplina' => $disciplina]) }}">Alterar</a></td>
                    <td>
                        <form method="POST" action="{{ route('disciplinas.destroy', ['disciplina' => $disciplina]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete">Apagar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection

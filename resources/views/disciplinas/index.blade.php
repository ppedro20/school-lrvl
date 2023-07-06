<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0,
                   maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Disciplinas</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <h1>Lista de disciplinas</h1>
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
</body>

</html>

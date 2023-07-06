<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0,
 maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cursos</title>
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
    <h1>Lista de cursos</h1>
    <p><a href="{{ route('cursos.create') }}">Criar novo curso</a></p>
    <table>
        <thead>
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
                        <a href="{{ route('cursos.show', ['curso' => $curso]) }}">Consultar</a>
                    </td>
                    <td>
                        <a href="{{ route('cursos.edit', ['curso' => $curso]) }}">Alterar</a>
                    </td>
                    <td>
                        <form method="POST" action="{{ route('cursos.destroy', ['curso' => $curso]) }}">
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

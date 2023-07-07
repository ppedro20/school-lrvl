<table class="table">
    <thead class="table-dark">
        <tr>
            @if ($showFoto)
                <th></th>
            @endif
            <th>Nome</th>
            @if ($showDepartamento ?? true)
                <th>Departamento</th>
            @endif
            @if ($showContatos)
                <th>E-Mail</th>
                <th>Gabinete</th>
                <th>Extensão</th>
                <th>Cacifo</th>
            @endif
            @if ($showDetail)
                <th class="button-icon-col"></th>
            @endif
            @if ($showEdit)
                <th class="button-icon-col"></th>
            @endif
            @if ($showDelete)
                <th class="button-icon-col"></th>
            @endif
        </tr>
    </thead>
    <tbody>
        @foreach ($docentes as $docente)
            <tr>
                @if ($showFoto)
                    <td><img src="/img/avatar_unknown.png" alt="Avatar" class="bg-dark rounded-circle" width="45"
                            height="45"></td>
                @endif
                <td>{{ $docente->user->name }}</td>
                @if ($showDepartamento ?? true)
                    <td>{{ $docente->departamentoRef->nome ?? '' }}</td>
                @endif
                @if ($showContatos)
                    <td>{{ $docente->user->email }}</td>
                    <td>{{ $docente->gabinete }}</td>
                    <td>{{ $docente->extensao }}</td>
                    <td>{{ $docente->cacifo }}</td>
                @endif
                @if ($showDetail)
                    <td class="button-icon-col"><a class="btn btn-secondary"
                            href="{{ route('docentes.show', ['docente' => $docente]) }}">
                            <i class="fas fa-eye"></i></a></td>
                @endif
                @if ($showEdit)
                    <td class="button-icon-col"><a class="btn btn-dark"
                            href="{{ route('docentes.edit', ['docente' => $docente]) }}">
                            <i class="fas fa-edit"></i></a></td>
                @endif
                @if ($showDelete)
                    <td class="button-icon-col">
                        <form method="POST" action="{{ route('docentes.destroy', ['docente' => $docente]) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" name="delete" class="btn btn-danger">
                                <i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                @endif
            </tr>
        @endforeach
    </tbody>
</table>

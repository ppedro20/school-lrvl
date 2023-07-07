@foreach ($anos as $ano => $semestres)
    <h5 class="text-center mt-3 bg-dark text-light py-2">{{ $ano }}º ano</h5>
    <div class="d-flex">
        @foreach ($semestres as $semestre => $disciplinas)
            <div class="flex-grow-1">
                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th colspan="3">{{ $semestre }}º semestre</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($disciplinas as $disciplina)
                            <tr>
                                <td>{{ $disciplina->abreviatura }}</td>
                                <td>{{ $disciplina->nome }}</td>
                                <td class="button-icon-col"><a class="btn btn-secondary"
                                        href="{{ route('disciplinas.show', ['disciplina' => $disciplina]) }}">
                                        <i class="fas fa-eye"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @if ($loop->first)
                <div style="width:20px">
                </div>
            @endif
        @endforeach
    </div>
@endforeach

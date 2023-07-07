<?php

namespace App\Http\Controllers;

use App\Models\Disciplina;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;
use App\Models\Curso;
use App\Http\Requests\DisciplinaRequest;


class DisciplinaController extends Controller
{
    public function index(Request $request): View
    {
        $cursos = Curso::all();
        $filterByCurso = $request->curso ?? '';
        $filterByAno = $request->ano ?? '';
        $filterBySemestre = $request->semestre ?? '';
        $disciplinaQuery = Disciplina::query();
        if ($filterByCurso !== '') {
            $disciplinaQuery->where('curso', $filterByCurso);
        }
        if ($filterByAno !== '') {
            $disciplinaQuery->where('ano', $filterByAno);
        }
        if ($filterBySemestre !== '') {
            $disciplinaQuery->where('semestre', $filterBySemestre);
        }
        $disciplinas = $disciplinaQuery->paginate(10);
        return view('disciplinas.index', compact(
            'disciplinas',
            'cursos',
            'filterByCurso',
            'filterByAno',
            'filterBySemestre'
        ));
    }

    public function create(): View
    {
        $disciplina = new Disciplina();
        $cursos = Curso::all();
        return view('disciplinas.create')
            ->withDisciplina($disciplina)
            ->withCursos($cursos);
    }

    public function store(DisciplinaRequest $request): RedirectResponse
    {
        Disciplina::create($request->validated());
        return redirect()->route('disciplinas.index');
    }

    public function show(Disciplina $disciplina): View
    {
        $cursos = Curso::all();
        return view('disciplinas.show')
            ->with('disciplina', $disciplina)
            ->with('cursos', $cursos);
    }

    public function edit(Disciplina $disciplina): View
    {
        $cursos = Curso::all();
        return view('disciplinas.edit', ['disciplina' => $disciplina, 'cursos' => $cursos]);
    }

    function update(DisciplinaRequest $request, Disciplina $disciplina): RedirectResponse
    {
        $disciplina->update($request->validated());
        return redirect()->route('disciplinas.index');
    }

    public function destroy(Disciplina $disciplina): RedirectResponse
    {
        $disciplina->delete();
        return redirect()->route('disciplinas.index');
    }
    public function __construct()
    {
        $this->authorizeResource(Disciplina::class, 'disciplina');
    }
}

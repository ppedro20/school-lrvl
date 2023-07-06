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
    public function index(): View
    {
        $disciplinas = Disciplina::paginate(10);
        return view('disciplinas.index', compact('disciplinas'));
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
}

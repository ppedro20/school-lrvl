<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Curso;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;

class CursoController extends Controller
{
    public function index(): View
    {
        $allCursos = Curso::all();
        return view('cursos.index')->with('cursos', $allCursos);
    }
    public function create(): View
    {
        $newCurso = new Curso();
        return view('cursos.create')->withCurso($newCurso);
    }
    public function store(Request $request): RedirectResponse
    {
        Curso::create($request->all());
        return redirect()->route('cursos.index');
    }
    public function edit(Curso $curso): View
    {
        return view('cursos.edit')->withCurso($curso);
    }
    public function update(Request $request, Curso $curso): RedirectResponse
    {
        $curso->update($request->all());
        return redirect()->route('cursos.index');
    }
    public function destroy(Curso $curso): RedirectResponse
    {
        $curso->delete();
        return redirect()->route('cursos.index');
    }
    public function show(Curso $curso): View
    {
        $anos = $this->getDisciplinasOfCursoOrganizadas($curso);
        return view('cursos.show', compact('curso', 'anos'));
    }
    private function getDisciplinasOfCursoOrganizadas(Curso $curso): array
    {
        $disciplinasOfCurso = $curso->disciplinas;
        // $disciplinasOfCurso is a Eloquent Collection. Check:
        //https://laravel.com/docs/eloquent-collections
        $anosCurso = $disciplinasOfCurso->sortBy('ano')->pluck('ano')->unique();
        $anos = [];
        foreach ($anosCurso as $ano) {
            $anos[$ano] = [
                1 => $disciplinasOfCurso
                    ->sortBy('semestre')->sortBy('nome')
                    ->where('ano', $ano)->whereIn('semestre', [0, 1]),
                2 => $disciplinasOfCurso
                    ->sortBy('semestre')->sortBy('nome')
                    ->where('ano', $ano)->whereIn('semestre', [0, 2]),
            ];
        }
        return $anos;
    }
    public function planoCurricular(Curso $curso): View
    {
        $cursos = Curso::pluck('abreviatura');
        $anos = $this->getDisciplinasOfCursoOrganizadas($curso);
        return view('planos_curriculares.index', compact('cursos', 'curso', 'anos'));
    }
}

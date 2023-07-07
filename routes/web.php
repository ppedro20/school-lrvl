<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DocenteController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\CandidaturaController;
use App\Http\Controllers\DepartamentoController;
use App\Http\Controllers\Auth\ChangePasswordController;


Route::view('/', 'home')->name('root');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('cursos/{curso}/plano', [CursoController::class, 'planoCurricular'])->name('cursos.plano_curricular');

Auth::routes(['verify' => true]);

Route::resource('candidaturas', CandidaturaController::class)->only(['create', 'store']);


Route::resource('candidaturas', CandidaturaController::class)->only(['index', 'show']);

Route::resource('departamentos', DepartamentoController::class);

Route::resource('cursos', CursoController::class);

Route::get('disciplinas/minhas', [DisciplinaController::class, 'minhasDisciplinas'])
    ->name('disciplinas.minhas')
    ->middleware('verified');
Route::resource('disciplinas', DisciplinaController::class);

Route::delete('docentes/{docente}/foto', [DocenteController::class, 'destroy_foto'])->name('docentes.foto.destroy');
Route::patch('/docentes/{docente}/admin', [DocenteController::class, 'changeAdmin'])->name('docentes.admin.change');
Route::resource('docentes', DocenteController::class);


Route::delete('alunos/{aluno}/foto', [AlunoController::class, 'destroy_foto'])->name('alunos.foto.destroy');
Route::resource('alunos', AlunoController::class);

// Add a "disciplina" to the cart:
Route::post('cart/{disciplina}', [CartController::class, 'addToCart'])->name('cart.add');

// Remove a "disciplina" from the cart:
Route::delete('cart/{disciplina}', [CartController::class, 'removeFromCart'])->name('cart.remove');

// Show the cart:
Route::get('cart', [CartController::class, 'show'])->name('cart.show');

// Confirm (store) the cart and save disciplinas registration on the database:
Route::post('cart', [CartController::class, 'store'])->name('cart.store');

// Clear the cart:
Route::delete('cart', [CartController::class, 'destroy'])->name('cart.destroy');

Route::get('/password/change', [ChangePasswordController::class, 'show'])->name('password.change.show');
Route::post('/password/change', [ChangePasswordController::class, 'store'])->name('password.change.store');

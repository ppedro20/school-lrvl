<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CursoController;
use App\Http\Controllers\DisciplinaController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DocenteController;
use App\Models\Departamento;
use App\Http\Controllers\DepartamentoController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'home')->name('root');;

//Route::get('cursos', [CursoController::class, 'index'])->name('cursos.index');
//Route::get('cursos/create', [CursoController::class, 'create'])->name('cursos.create');
//Route::post('cursos', [CursoController::class, 'store'])->name('cursos.store');
//Route::get('cursos/{curso}/edit', [CursoController::class, 'edit'])->name('cursos.edit');
//Route::put('cursos/{curso}', [CursoController::class, 'update'])->name('cursos.update');
//Route::delete('cursos/{curso}', [CursoController::class, 'destroy'])->name('cursos.destroy');
//Route::get('cursos/{curso}', [CursoController::class, 'show'])->name('cursos.show');
Route::resource('cursos', CursoController::class);

Route::resource('disciplinas', DisciplinaController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('docentes', DocenteController::class);
Route::resource('departamentos', DepartamentoController::class);



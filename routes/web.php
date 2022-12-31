<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PendentesController;
use App\Http\Controllers\ProfileController;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use App\Models\User;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth', 'pendent')->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('exercises', ExerciseController::class)->names('exercises');

    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
    Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::post('/admin/{admin}/update/', [AdminController::class, 'update'])->name('admin.update');
    Route::delete('/admin/{admin}/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');
    Route::get('/admin/{admin}/show', [AdminController::class, 'show'])->name('admin.show');

    // Rotas de pendentes

    Route::get('/alunos/pendentes', [PendentesController::class, 'alunos'])->name('alunosPendentes.index');
    Route::get('/professores/pendentes', [PendentesController::class, 'professores'])->name('professoresPendentes.index');
    Route::post('/confirma/pendente/{aluno}', [PendentesController::class, 'confirmaAluno'])->name('confirmaAluno.pendente');
    Route::post('/confirma/pendente/{professor}', [PendentesController::class, 'confirmaProfessor'])->name('confirmaProfessor.pendente');
    Route::delete('/recusa/pendente/{aluno}', [PendentesController::class, 'recusaAluno'])->name('recusaAluno');
    Route::delete('/recusa/pendente/{professor}', [PendentesController::class, 'recusaProfessor'])->name('recusaProfessor');

});
Route::get('/registroAluno', [RegisterController::class, 'registraAlunoIndex'])->name('registraAluno.index');
Route::post('/registro/aluno', [RegisterController::class, 'registraAluno'])->name('registra.aluno');
Route::get('/registroProfessor', [RegisterController::class, 'registraProfessorIndex'])->name('registraProfessor.index');
Route::post('/registro/professor', [RegisterController::class, 'registraProfessor'])->name('registra.professor');

require __DIR__.'/auth.php';

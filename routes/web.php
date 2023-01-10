<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EquipamentController;
use App\Http\Controllers\PendentesController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\CardController;
use App\Http\Controllers\TrainingModeController;
use Illuminate\Support\Facades\Route;



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



Route::middleware('auth', 'pendent')->group(function () {

    Route::get('/', function () {
        return view('dashboard');
    });

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('exercises', ExerciseController::class)->names('exercises');

    Route::resource('clients', ClientController::class)->names('clients');

    Route::resource('equipaments', EquipamentController::class)->names('equipaments');

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

    Route::get('/testroute',[SendMailController::class,'index']);

    Route::get('/card', [CardController::class, 'index'])->name('cards.index');
    Route::get('/card/create', [CardController::class, 'create'])->name('cards.create');
    Route::post('/card/store', [CardController::class, 'store'])->name('cards.store');
    Route::get('/card/{card}/edit', [CardController::class, 'edit'])->name('cards.edit');
    Route::put('/card/{card}/update/', [CardController::class, 'update'])->name('cards.update');
    Route::delete('/card/{card}/destroy', [CardController::class, 'destroy'])->name('cards.destroy');
    Route::get('/card/{card}/show', [CardController::class, 'show'])->name('cards.show');
    
    Route::get('/personal', [PersonalController::class, 'index'])->name('personals.index');
    Route::get('/personal/create', [PersonalController::class, 'create'])->name('personals.create');
    Route::post('/personal/store', [PersonalController::class, 'store'])->name('personals.store');
    Route::get('/personal/{personal}/edit', [PersonalController::class, 'edit'])->name('personals.edit');
    Route::put('/personal/{personal}/update/', [PersonalController::class, 'update'])->name('personals.update');
    Route::delete('/personal/{personal}/destroy', [PersonalController::class, 'destroy'])->name('personals.destroy');
    Route::get('/personal/{personal}/show', [PersonalController::class, 'show'])->name('personals.show');
    
    //Training mode
    Route::get('/trainingMode/{card}', [TrainingModeController::class, 'trainingMode'])->name('card.trainingMode');

    
    Route::get('/registroAluno', [RegisterController::class, 'registraAlunoIndex'])->name('registraAluno.index');
    Route::post('/registro/aluno', [RegisterController::class, 'registraAluno'])->name('registra.aluno');
    Route::get('/registroProfessor', [RegisterController::class, 'registraProfessorIndex'])->name('registraProfessor.index');
    Route::post('/registro/professor', [RegisterController::class, 'registraProfessor'])->name('registra.professor');
});


require __DIR__.'/auth.php';

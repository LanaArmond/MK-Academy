<?php

use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PersonalController;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('exercises', ExerciseController::class)->names('exercises');

});

Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::get('/admin/create', [AdminController::class, 'create'])->name('admin.create');
Route::post('/admin/store', [AdminController::class, 'store'])->name('admin.store');
Route::get('/admin/{admin}/edit', [AdminController::class, 'edit'])->name('admin.edit');
Route::post('/admin/{admin}/update/', [AdminController::class, 'update'])->name('admin.update');
Route::delete('/admin/{admin}/destroy', [AdminController::class, 'destroy'])->name('admin.destroy');
Route::get('/admin/{admin}/show', [AdminController::class, 'show'])->name('admin.show');

Route::get('/personal', [PersonalController::class, 'index'])->name('personals.index');
Route::get('/personal/create', [PersonalController::class, 'create'])->name('personals.create');
Route::post('/personal/store', [PersonalController::class, 'store'])->name('personals.store');
Route::get('/personal/{personal}/edit', [PersonalController::class, 'edit'])->name('personals.edit');
Route::post('/personal/{personal}/update/', [PersonalController::class, 'update'])->name('personals.update');
Route::delete('/personal/{personal}/destroy', [PersonalController::class, 'destroy'])->name('personals.destroy');
Route::get('/personal/{personal}/show', [PersonalController::class, 'show'])->name('personals.show');


require __DIR__.'/auth.php';

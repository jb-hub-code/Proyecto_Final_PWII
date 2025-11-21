<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\AdminUserController;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/usuarios', [AdminUserController::class, 'index'])
        ->name('admin.usuarios');
});

Route::get('/admin/login', [AdminController::class, 'showLogin']);
Route::post('/admin/login', [AdminController::class, 'login']);

Route::get('/admin/register', [AdminController::class, 'showRegister']);
Route::post('/admin/register', [AdminController::class, 'register']);

Route::get('/admin/logout', [AdminController::class, 'logout']);

Route::get('/admin/usuarios', [AdminUserController::class, 'index'])
    ->middleware('auth');

Route::get('/usuarios', [UserController::class, 'index'])->name('usuarios.index');
    
Route::get('/services', function () {
    return view('services');
})->name('services');

// Mostrar formulario
Route::get('usuarios/modificar/{id}', [UserController::class, 'edit']);

// Guardar cambios
Route::post('usuarios/modificar/{id}', [UserController::class, 'update']);

Route::get('usuarios/confirmar', function() {
    return view('usuarios.confirmar');
})->name('usuarios.confirmar');

Route::post('usuarios/validar', [UserController::class, 'validar'])->name('usuarios.validar');

Route::get('/verify-phone', [UserController::class, 'showVerifyPhone'])->name('verify.phone');
Route::post('/verify-phone', [UserController::class, 'verifyPhone'])->name('verify.phone.submit');


require __DIR__ . '/auth.php';

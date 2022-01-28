<?php

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
    return view('evento.home');
});

Route::group(['middleware' => ['auth']], function () {

    Route::get('/evento', [App\Http\Controllers\EventoController::class, 'index']);
    Route::post('/evento/mostrar', [App\Http\Controllers\EventoController::class, 'show']);
    Route::post('/evento/agregar', [App\Http\Controllers\EventoController::class, 'store']);
    Route::post('/evento/editar/{id}', [App\Http\Controllers\EventoController::class, 'edit']); 
    Route::post('/evento/actualizar/{evento}', [App\Http\Controllers\EventoController::class, 'update']); 
    Route::post('/evento/borrar/{id}', [App\Http\Controllers\EventoController::class, 'destroy']); 
    });
    
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/users/create', [App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::post('/users', [App\Http\Controllers\UserController::class, 'store'])->name('users.store');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [App\Http\Controllers\UserController::class, 'show'])->name('users.show');
    Route::get('/users/{user}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('users.edit');
    Route::put('/users/{user}', [App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [App\Http\Controllers\UserController::class, 'destroy'])->name('users.delete');

    Route::resource('posts', App\Http\Controllers\PostController::class);

    Route::resource('permissions', App\Http\Controllers\PermissionController::class);
    Route::resource('roles', App\Http\Controllers\RoleController::class);
});
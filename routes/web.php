<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/home');

Route::middleware('auth')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::resource('clients', App\Http\Controllers\ClientController::class);
    Route::resource('projects', 'App\Http\Controllers\ProjectsController');
    Route::resource('users', \App\Http\Controllers\UsersController::class);
    Route::resource('tasks', \App\Http\Controllers\TasksController::class);

    Route::get('/admin/dashboard', [\App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
});

Auth::routes();


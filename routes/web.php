<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('tasks', TaskController::class);

Route::get('/search-users', [UserController::class, 'search'])->name('search.users');
Route::get('/search-admins', [AdminController::class, 'search'])->name('search.admins');
Route::get('tasks-statistics', [StatisticsController::class, 'index'])->name('tasks.statistics');

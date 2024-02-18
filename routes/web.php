<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DeveloperController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TaskController;

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


Route::get('/admin-register', [AdminController::class, 'index'])->name('admin.register.view');
Route::post('/admin-register', [RegisterController::class, 'store'])->name('admin.register');


Route::get('/login', [LoginController::class, 'login'])->name('login');

Route::post('/admin-login', [LoginController::class, 'store'])->name('post.admin.login');

Route::get('/developer-register', [DeveloperController::class, 'index'])->name('developer.register.view');

Route::get('/user-logout', [DeveloperController::class, 'logout'])->name('developer.logout');

Route::get('/admin-logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::group(['middleware' => ['auth:admin']], function() {
    Route::get('/admin-dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('/admin-tasks', [AdminController::class, 'adminindex'])->name('admin.task.index');
});


Route::group(['middleware' => ['auth:user']], function() {
    Route::get('/user-dashboard', [DeveloperController::class, 'dashboard'])->name('user.dashboard');
    Route::get('/tasks', [TaskController::class, 'index'])->name('task.index');
    Route::get('/create-tasks', [TaskController::class, 'create'])->name('task.create');
    Route::post('/create-tasks', [TaskController::class, 'store'])->name('task.store');
    Route::post('/update-status', [TaskController::class, 'UpdateStatus'])->name('update.status');

    Route::get('/edit/{id}', [TaskController::class, 'show'])->name('task.edit');
    Route::post('/update-task', [TaskController::class, 'update'])->name('task.update');
    Route::post('/delete-task', [TaskController::class, 'destroy'])->name('task.delete');

    Route::get('/tasks/filter', [TaskController::class, 'filter'])->name('tasks.filter');
});


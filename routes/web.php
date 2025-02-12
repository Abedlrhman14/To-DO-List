<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskManger;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function()
{
    Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
    Route::get('/',[TaskManger::class,"listTask"])->name('home');
     Route::get('task/add',[TaskManger::class,'addTask'])->name('task.add');
     Route::post('task/add',[TaskManger::class,'addTaskPost'])->name('task.add.post');
     Route::get('task/status/{id}',[TaskManger::class,'update'])->name('task.status.update');
     Route::get('task/delete/{id}',[TaskManger::class,'deleteTask'])->name('task.status.delete');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

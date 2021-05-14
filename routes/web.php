<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FormController;
use App\Http\Controllers\TaskController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'forms'], function(){
   Route::get('', [FormController::class, 'index'])->name('form.index');
   Route::get('create', [FormController::class, 'create'])->name('form.create');
   Route::post('store', [FormController::class, 'store'])->name('form.store');
   Route::get('edit/{form}', [FormController::class, 'edit'])->name('form.edit');
   Route::post('update/{form}', [FormController::class, 'update'])->name('form.update');
   Route::post('delete/{form}', [FormController::class, 'destroy'])->name('form.destroy');
   Route::get('show/{form}', [FormController::class, 'show'])->name('form.show');
});

Route::group(['prefix' => 'tasks'], function(){
   Route::get('', [TaskController::class, 'index'])->name('task.index');
   Route::get('create', [TaskController::class, 'create'])->name('task.create');
   Route::post('store', [TaskController::class, 'store'])->name('task.store');
   Route::get('edit/{task}', [TaskController::class, 'edit'])->name('task.edit');
   Route::post('update/{task}', [TaskController::class, 'update'])->name('task.update');
   Route::post('delete/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
   Route::get('show/{task}', [TaskController::class, 'show'])->name('task.show');
});




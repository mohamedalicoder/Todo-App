<?php

use App\Http\Controllers\TodoListController;
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

Route::resource('todo',TodoListController::class);
Route::get('todo/deleted/data', [TodoListController::class, 'deletedData'])->name('todo.deletedData');
Route::put('todo/restore/{id}', [TodoListController::class, 'restore'])->name('todo.restore');
Route::delete('todo/force-delete/{id}', [TodoListController::class, 'forceDelete'])->name('todo.forceDelete');




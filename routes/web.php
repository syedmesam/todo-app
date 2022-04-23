<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;

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
Route::get('/logout', function(){
    Auth::logout();
    return Redirect::to('login');
 });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('/tasks', 'tasks');


Route::get('/todos/index',[TodoController::class,'index']);
Route::get('/todos/create',[TodoController::class,'create'])->name('create');
Route::post('/todos/upload',[TodoController::class,'upload'])->name('upload');
Route::get('/{id}/edit',[TodoController::class,'edit'])->name('edit');
Route::post('/update',[TodoController::class , 'update'])->name('updateTodo');
Route::get('/{todo}/completed',[TodoController::class , 'completed']);
Route::get('/{id}/delete',[TodoController::class,'delete'])->name('deleteTodo');
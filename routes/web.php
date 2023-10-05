<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
use App\Http\Controllers\CategoryController;

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

Route::get('/todos', TodosController::class . '@index')->name('todos');

Route::post('/todos', TodosController::class . '@store');

Route::delete('/todos/{id}', [TodosController::class , 'destroy'])->name('todos-destroy');

Route::get('/todos/{id}', [TodosController::class , 'show'])->name('todos-edit');

Route::patch('/todos/{id}', [TodosController::class , 'update'])->name('todos-update');

// Categories
Route::resource('categories', CategoryController::class);

//Inicio de sesion y registro

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('/register', 'Auth\RegisterController@register');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

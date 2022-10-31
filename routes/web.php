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
    return view('welcome');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/create', [App\Http\Controllers\HomeController::class, 'create'])->name('create');

Route::post('/create', [App\Http\Controllers\HomeController::class, 'createSubmit'])->name('create.submit');

Route::get('/list', [App\Http\Controllers\HomeController::class, 'list'])->name('list');

Route::delete('/delete/{id}', [App\Http\Controllers\HomeController::class, 'delete'])->name('delete');

Route::get('/filter', [App\Http\Controllers\HomeController::class, 'filter'])->name('filter');

Route::post('/filter', [App\Http\Controllers\HomeController::class, 'filterSubmit'])->name('filter.submit');

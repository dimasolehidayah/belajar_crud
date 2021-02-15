<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuruController;
use App\Http\Controllers\SiswaController;
use \App\Http\Controllers\UserController;

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

Route::get('/', [GuruController::class, 'index']);
Route::get('/guru',  [GuruController::class, 'index'])->name('guru');
Route::get('/guru/detail/{id}',  [GuruController::class, 'detail']);
Route::get('/guru/add',  [GuruController::class, 'add']);
Route::post('/guru/insert',  [GuruController::class, 'insert']);
Route::get('/guru/edit/{id}',  [GuruController::class, 'edit']);
Route::post('/guru/update/{id}',  [GuruController::class, 'update']);
Route::get('/guru/delete/{id}',  [GuruController::class, 'delete']);

Route::get('/siswa', [SiswaController::class, 'index']);
Route::get('/siswa/print', [SiswaController::class, 'print']);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/user', [UserController::class, 'index']);

Route::group(['prefix' => 'admin'], function () {

});

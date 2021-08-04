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

//Auth::routes();

Route::get('/adminzk/login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('/adminzk/login');
Route::post('/adminzk/login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/adminzk/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);
Route::get('/adminzk/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('/adminzk/register');
Route::post('/adminzk/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/adminzk', [App\Http\Controllers\AdminHomeController::class, 'index']);

Route::get('/adminzk/banners', [App\Http\Controllers\AdminHomeController::class, 'admin_to_view'])->name('banners');
Route::get('/adminzk/banners/crear', [App\Http\Controllers\EditarController::class, 'admin_create'])->name('banners');
Route::get('/adminzk/banners/editar/{typeId}', [App\Http\Controllers\EditarController::class, 'admin_edit'])->name('banners');

Route::get('/adminzk/noticias', [App\Http\Controllers\AdminHomeController::class, 'admin_to_view'])->name('noticias');
Route::get('/adminzk/noticias/crear', [App\Http\Controllers\EditarController::class, 'admin_create'])->name('noticias');
Route::get('/adminzk/noticias/editar/{typeId}', [App\Http\Controllers\EditarController::class, 'admin_edit'])->name('noticias');

Route::get('/adminzk/jugadores', [App\Http\Controllers\AdminHomeController::class, 'admin_to_view'])->name('jugadores');
Route::get('/adminzk/jugadores/crear', [App\Http\Controllers\EditarController::class, 'admin_create'])->name('jugadores');
Route::get('/adminzk/jugadores/editar/{typeId}', [App\Http\Controllers\EditarController::class, 'admin_edit'])->name('jugadores');

Route::get('/adminzk/calendario', [App\Http\Controllers\AdminHomeController::class, 'admin_to_view'])->name('calendario');
Route::get('/adminzk/calendario/crear', [App\Http\Controllers\EditarController::class, 'admin_create'])->name('calendario');
Route::get('/adminzk/calendario/editar/{typeId}', [App\Http\Controllers\EditarController::class, 'admin_edit'])->name('calendario');

Route::get('/adminzk/media', [App\Http\Controllers\AdminHomeController::class, 'admin_to_view'])->name('media');
Route::get('/adminzk/media/crear', [App\Http\Controllers\EditarController::class, 'admin_create'])->name('media');
Route::get('/adminzk/media/editar/{typeId}', [App\Http\Controllers\EditarController::class, 'admin_edit'])->name('media');


Route::get('/{any}', [App\Http\Controllers\SpaController::class, 'index'])->where('any', '.*');

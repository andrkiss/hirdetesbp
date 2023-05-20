<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\kapcsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pluszOldalController;

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

Route::get('/', [AdController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard',  ([HomeController::class, 'index']))->name('dashboard');
});

Route::resource('ad', AdController::class);
Route::resource('user', UserController::class);
Route::resource('category', CategoryController::class);

Route::get('/ad/kategoria/{kat_id}', [kapcsController::class, 'hirdKategoria'])->name('hirdkat')->middleware('dumpMiddleware');

Route::get('/components/bifent', [kapcsController::class, 'bifent'])->name('bifent');

Route::get('/components/kereso', [kapcsController::class, 'kereso'])->name('kereso');

Route::get('/pluszoldal', [pluszOldalController::class, 'index']);

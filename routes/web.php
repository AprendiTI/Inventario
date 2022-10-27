<?php

use App\Http\Controllers\AsignController;
use App\Http\Controllers\ConteosController;
use App\Http\Controllers\CopyController;
use Illuminate\Support\Facades\Route;
use app\Models\Roles;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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
    return redirect()->route('home');
})->middleware('auth');

Auth::routes();

Route::resources([
    'user' => UserController::class,
    'copia' => CopyController::class,
    'asignar' => AsignController::class,
    'conteos' => ConteosController::class,
]);

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/contar/{id}', [HomeController::class, 'edit'])->name('contar');
Route::get('/lista/{id}/{ncount}', [ConteosController::class, 'Lista'])->name('lista');
Route::get('/change/{id}', [ConteosController::class, 'ChangeState'])->name('changestate');

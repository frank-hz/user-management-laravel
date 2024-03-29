<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

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

Route::get('/', [AccountController::class, 'index']);
Route::get('/user-new', [AccountController::class, 'new']);
Route::post('/user-create', [AccountController::class, 'create']);
Route::get('/user-edit/{id}', [AccountController::class, 'edit']);
Route::put('/user-update', [AccountController::class, 'update']);
Route::delete('/user-delete/{id}', [AccountController::class, 'delete']);


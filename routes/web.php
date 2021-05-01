<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Todo\TodoController;

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
//Todo Resource Controller //
Route::resource('/todo',TodoController::class);

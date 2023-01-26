<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\testCotroller;
use App\Http\Controllers\test\testController;

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
Route::get('/test', [testCotroller::class, 'index'])->name('index');
Route::post('/test-add', [testCotroller::class, 'addtest'])->name('addtest');

Route::get('/liveTest', [testController::class, 'index'])->name('index');
Route::post('/add/liveTest', [testController::class, 'addTest'])->name('addTest');

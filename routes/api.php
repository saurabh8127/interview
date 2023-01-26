<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\Item\ItemController;
use App\Http\Controllers\Api\Color\ColorCaontroller;
use App\Http\Controllers\Api\Company\CompanyController;
use App\Http\Controllers\Api\Category\CategoryController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);
Route::post('login', [LoginController::class, 'login']);

//category route
Route::post('create-category', [CategoryController::class, 'createCategory'])->name('createCategory');
Route::post('delete-category', [CategoryController::class, 'deleteCategoey'])->name('deleteCategoey');
Route::post('get-data', [CategoryController::class, 'getCategoryData'])->name('getCategoryData');
Route::post('edit-data', [CategoryController::class, 'editCategoryData'])->name('editCategoryData');

//color route
Route::post('create-color', [ColorCaontroller::class, 'createColor'])->name('createColor');
Route::post('delete-color', [ColorCaontroller::class, 'deleteColor'])->name('deleteColor');
Route::post('get-color-data', [ColorCaontroller::class, 'getColorData'])->name('getColorData');
Route::post('edit-color-data', [ColorCaontroller::class, 'editColorData'])->name('editColorData');

//company
Route::post('create-company', [CompanyController::class, 'createCompany'])->name('createCompany');
Route::post('deleteCompany', [CompanyController::class, 'deleteCompany'])->name('deleteCompany');
Route::post('getCompanyData', [CompanyController::class, 'getCompanyData'])->name('getCompanyData');
Route::post('editCompanyData', [CompanyController::class, 'editCompanyData'])->name('editCompanyData');

//item route
Route::post('addItem', [ItemController::class, 'addItem'])->name('addItem');
Route::post('deleteItem', [ItemController::class, 'deleteItem'])->name('deleteItem');
Route::post('getItemData', [ItemController::class, 'getItemData'])->name('getItemData');
Route::post('editItemData', [ItemController::class, 'editItemData'])->name('editItemData');

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookBorrowController;
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

Route::group(['middleware' => ['web']], function () {
    
    Route::prefix('admin/')->group(function () {
        Route::get('/', function () {
            return view('admin.index');
        })->name('admin.index');
     
        Route::resource('category', CategoryController::class);
        Route::resource('author', AuthorController::class);
        Route::resource('book', BookController::class);
        Route::resource('user', UserController::class);
        Route::resource('bookBorrow', BookBorrowController::class);
    });

});

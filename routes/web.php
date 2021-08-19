<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\VideoController;
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

// DASHBOARD
Auth::routes(['register' => false]);
Auth::routes();
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin');

// FRONTEND
Route::get('/', [HomepageController::class, 'index'])->name('video.index');
Route::get('/popularne', [HomepageController::class, 'popular'])->name('video.popular');
Route::get('/{slug}', [VideoController::class, 'index'])
    ->where('slug', '[A-Za-z0-9\-]+');



Route::get('/kategoria/{slug}', [HomepageController::class, 'category'])->name('video.category');

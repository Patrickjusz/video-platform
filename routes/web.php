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
Route::get('/', [HomepageController::class, 'index']);
Route::get('/{slug}', [VideoController::class, 'index'])
    ->where('slug', '[A-Za-z0-9\-]+');

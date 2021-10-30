<?php

use App\Http\Controllers\CKEditorController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Models\Video;
use App\Services\Sitemap;

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

// TOOLS
Route::get('/generateSitemap', function () {
    Sitemap::create();
})->name('sitemap.generate');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('search');

Route::get('/generateEclapsedTime', function () {
    $video = Video::where('state', '!=', 'delete')->orderByDesc('created_at')->get();

    foreach ($video as $video) {
        $video->elapsed_time = timeElapsedString($video->created_at);
        $video->save();
    }
})->name('elapsed_time.generate');


// DASHBOARD

Auth::routes(['register' => false, 'reset' => false]);

//AdminController
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
Route::put('/edit/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
Route::get('/add', [App\Http\Controllers\AdminController::class, 'add'])->name('admin.add');
Route::post('/remove', [App\Http\Controllers\AdminController::class, 'remove'])->name('admin.remove');

// TagController
Route::get('/edit_tags', [App\Http\Controllers\TagController::class, 'index'])->name('tag.index');
Route::get('/edit_tags/{id}', [App\Http\Controllers\TagController::class, 'edit'])->name('tag.edit');
Route::put('/edit_tags/{id}', [App\Http\Controllers\TagController::class, 'update'])->name('tag.update');
Route::post('/remove_tag', [App\Http\Controllers\TagController::class, 'destroy'])->name('tag.destroy');
Route::get('/add_tag', [App\Http\Controllers\TagController::class, 'store'])->name('tag.store');

// FRONTEND
Route::get('/', [HomepageController::class, 'index'])->name('video.index');
Route::get('/popularne', [HomepageController::class, 'popular'])->name('video.popular');
Route::get('/kategoria/{slug}', [HomepageController::class, 'tag'])
    ->where('tag', '[A-Za-z0-9\-]+');
Route::get('/{slug}', [VideoController::class, 'index'])
    ->where('slug', '[A-Za-z0-9\-]+');

Route::post('ckeditor/upload', [CKEditorController::class, 'upload'])->name('ckeditor.image-upload');

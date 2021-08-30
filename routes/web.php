<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use App\Models\Video;

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

// Route::get('/gen', function () {
//     //https://github.com/Laravelium/laravel-sitemap/wiki/Generate-sitemap
//     $video = Video::where('state', 'active')->get();
//     $latestVideo = Video::where('state', 'active')->latest()->first();
//     $lastMod = ($latestVideo->updated_at ?? $latestVideo->created_at);

//     $sitemap = App::make("sitemap");
//     $sitemap->add(env('APP_URL'), $lastMod, 1, 'daily');
//     $sitemap->add(env('APP_URL') . '/popularne', $lastMod, 1, 'daily');

//     foreach ($video as $video) {
//         $videoUrl = env('APP_URL') . '/' . $video->slug;
//         $lastMod = ($video->updated_at ?? $video->created_at);
//         $sitemap->add($videoUrl, $lastMod, 1, 'monthly');
//     }

//     $sitemap->store('xml', 'sitemap');
// });

// DASHBOARD
Route::get('/search', [SearchController::class, 'search'])->name('search');

Auth::routes(['register' => false]);
Auth::routes();
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index');
Route::get('/edit/{id}', [App\Http\Controllers\AdminController::class, 'edit'])->name('admin.edit');
Route::put('/edit/{id}', [App\Http\Controllers\AdminController::class, 'update'])->name('admin.update');
Route::get('/add', [App\Http\Controllers\AdminController::class, 'add'])->name('admin.add');
Route::post('/remove', [App\Http\Controllers\AdminController::class, 'remove'])->name('admin.remove');


// FRONTEND
Route::get('/', [HomepageController::class, 'index'])->name('video.index');
Route::get('/popularne', [HomepageController::class, 'popular'])->name('video.popular');
Route::get('/{slug}', [VideoController::class, 'index'])
    ->where('slug', '[A-Za-z0-9\-]+');



// Route::get('/kategoria/{slug}', [HomepageController::class, 'category'])->name('video.category');

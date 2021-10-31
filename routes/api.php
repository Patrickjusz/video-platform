<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Video;
use App\Http\Resources\VideosResource;
use App\Services\DatatablesGenerator;
use Dflydev\DotAccessData\Data;

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

Route::get('/videos', function () {
    return VideosResource::collection(Video::where('state', 'public')->get());
})->middleware('auth.apikey');

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/datatable', function () {
    return DatatablesGenerator::getVideos();
})->middleware('auth.apikey');

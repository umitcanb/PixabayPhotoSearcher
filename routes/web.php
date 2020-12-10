<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;

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
    return view('photos.search');
});

Route::get('/photos', [PhotoController::class, 'index']);

Route::post('photos.api', [PhotoController::class, 'getPhotos'])->name('photo.getPhotos');
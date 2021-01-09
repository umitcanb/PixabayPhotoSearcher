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
    return view('photo.search');
});

//Route::get('/photos')->name('photo.search');

Route::post('photo.results', [PhotoController::class, 'getPhotos'])->name('photo.getPhotos');

//Route::get('photo.results')->name('photo.results');

Route::post('/image/save', [PhotoController::class, 'saveImage']); 
Route::post('/image/unsave', [PhotoController::class, 'unsaveImage']); 


Route::get('/saved', [PhotoController::class, 'getSavedPhotos'])->name('photo.saved');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

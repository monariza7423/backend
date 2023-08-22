<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WorkController;

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


Route::prefix('news')
->controller(NewsController::class)
->group(function() {
    Route::get('/', 'index')->name('news.index');
    Route::get('/create', 'create')->name('news.create');
    Route::post('/', 'create')->name('news.store');
    Route::get('/{id}', 'show')->name('news.show');
    Route::patch('/update/{id}', 'update')->name('news.update');
    Route::delete('/{id}', 'destroy')->name('news.delete');
});


Route::prefix('work')
->controller(WorkController::class)
->group(function(){
    Route::get('/', 'index')->name('work.index');
    Route::get('/create', 'create')->name('work.create');
    Route::post('/', 'create')->name('work.store');
    Route::patch('/update/{id}', 'update')->name('work.update');
    Route::delete('/{id}', 'destroy')->name('work.delete');
});
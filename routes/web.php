<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VisitController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::group(['middleware'=>'auth','prefix'=>'dashboard'],function(){

    Route::get('/links',[LinkController::class, 'index'])->name('index');
    Route::get('/links/new',[LinkController::class, 'create'])->name('create');
    Route::post('/links/new',[LinkController::class, 'store'])->name('newlink');
    Route::get('/links/{link}',[LinkController::class, 'edit']);
    Route::post('/links/{link}',[LinkController::class, 'update']);
    Route::delete('/links/{link}',[LinkController::class, 'destroy']);

    Route::get('/settings',[UserController::class, 'edit']);
    Route::post('/settings',[UserController::class, 'update']);
}
);
Route::post('/visit/{link}',[VisitController::class, 'store']);
Route::get('/{user}',[UserController::class, 'show']);



<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

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

Route::controller(PostController::class)->middleware(['auth'])->group(function(){
    
    // 問1：'index'は何を表しているか
    Route::get('/', 'index')->name('index');
    
    Route::post('/posts', 'store')->name('store');
    Route::get('/posts/create', 'create')->name('create');
    
    // 問5：{post}はどこのファイルの何と一致している必要があるか
    Route::get('/posts/{post}', 'show')->name('show');
    
    Route::post('/posts/{post}', 'update')->name('update');
    Route::delete('/posts/{post}', 'delete')->name('delete');
    Route::get('/posts/{post}/edit', 'edit')->name('edit');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';

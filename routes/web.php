<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
// topページへのルーティング
Route::get('/', [App\Http\Controllers\TopController::class, 'index']);
// 投稿ページのルーティング
Route::get('/post', [App\Http\Controllers\PostController::class, 'index']);
// 詳細ページのルーティング
Route::get('/detail', [App\Http\Controllers\DetailController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

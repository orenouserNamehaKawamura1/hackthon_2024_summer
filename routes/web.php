<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    if (Auth::check()) {
        // ログインしているユーザーはリダイレクト
        return redirect('/top');
    }

    // 未ログインのユーザーにはトップページを表示
    return view('top');
});

Auth::routes();
// topページへのルーティング(ログインしたユーザーがアクセスできる)
Route::get('/top', [App\Http\Controllers\TopController::class, 'top'])->middleware('auth');
// 投稿ページのルーティング
Route::get('/post', [App\Http\Controllers\PostController::class, 'index']);
Route::Post('/post', [App\Http\Controllers\PostController::class, 'addPost']);
// 詳細ページのルーティング
Route::get('/detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
// コメント機能で使用するルーティング
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'index']);

//ログインのルーティング
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ログアウトのルーティング
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

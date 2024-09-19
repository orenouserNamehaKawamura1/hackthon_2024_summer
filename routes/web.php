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
Route::get('/post', [App\Http\Controllers\PostController::class, 'index'])->middleware('auth');
Route::Post('/post', [App\Http\Controllers\PostController::class, 'addPost'])->middleware('auth');
// 詳細ページのルーティング
Route::get('/detail/{id}', [App\Http\Controllers\DetailController::class, 'index'])->name('detail');
//いいね機能のルーティング
Route::post('detail/{id}',[App\Http\Controllers\DetailController::class, 'count_increment'])->name('detail');
// コメント機能で使用するルーティング
Route::post('/comment', [App\Http\Controllers\CommentController::class, 'index']);
// 編集ページのルーティング
Route::get('/edit/{id}', [App\Http\Controllers\EditController::class, 'index'])->name('edit');
// マイページのルーティング
Route::get('/myPage', [App\Http\Controllers\MyPageController::class, 'index']);

//ログインのルーティング
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//ログアウトのルーティング
Route::get('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout']);

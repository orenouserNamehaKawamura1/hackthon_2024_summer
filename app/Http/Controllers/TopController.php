<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Post;

class TopController extends Controller
{
    public function index(){
        // if (Auth::check()) {
        //     // ログインしているユーザーはリダイレクト
        //     return redirect('/top');
        // } else {
        //     // 未ログインのユーザーにはトップページを表示
        //     return view('top');
        // }
        $items = Post::all()->sortByDesc("created_at");
        return view("top",["items" => $items]);
    }

    // public function top() {
    //     $items = Post::all()->sortByDesc("created_at");
    //     return view("top",["items" => $items]);
    // }
}

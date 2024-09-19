<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Post;

class MyPageController extends Controller
{
    public function index(){
        $userId = Auth::id();
        // 投稿の一覧を取得する
        $items = Post::where('user_id',$userId)->get()->sortByDesc("created_at");
        return view("myPage",["items" => $items]);
    }
}

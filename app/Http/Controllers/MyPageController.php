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
        $posts = Post::where('user_id',$userId)->where("delete_flag",0)->get()->sortByDesc("created_at");
        $goods = Post::whereHas("favoritesPosts",function($q) use ($userId){$q->where("user_id",$userId);})->where("delete_flag",0)->orderByDesc("created_at")->get();
        $comments= Post::whereHas("comment",function($q) use ($userId){$q->where("user_id",$userId);})->where("delete_flag",0)->orderByDesc("created_at")->get();
        
        // $goods = Post::where('user_id',$userId)->where("delete_flag",0)->get()->sortByDesc("created_at");
        return view("myPage",["posts" => $posts,"goods" => $goods, "comments" => $comments]);
    }
}

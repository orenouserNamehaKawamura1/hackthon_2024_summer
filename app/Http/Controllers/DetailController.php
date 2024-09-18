<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;
use App\Models\Comment;

class DetailController extends Controller
{
    public function index(Request $request){
        // getパラメータでidを受けとる
        $id = $request->id;
        // データベースからid検索による投稿情報を受け取る
        $item = Post::find($id);
        // データベースからid検索によるユーザー情報を受け取る
        $user = User::find(1);
        // データベースからタグの情報を受け取る
        $tag = Tag::find($item["tag_id"]);
        // データベースからコメントの一覧を取得する
        $comment = Comment::where("post_id",$id)->get();

        return view("detail",["item" => $item,"user" => $user,"tag" => $tag,"comments" => $comment]);
    }
}

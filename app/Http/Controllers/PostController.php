<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;

class PostController extends Controller
{
    public function index(){
        // Tagsテーブルからタグの一覧処理を取得する
        $items = Tag::all();
        return view("post",["items" => $items]);
    }

    // 投稿されたデータをデータベースに登録する関数
    public function addPost(Request $request){
        // 登録するデータを受け取る
        $title = $request->title;
        $tag = $request->tag;
        $description = $request->description;
        $problem = $request->problem;

        // 登録するデータの連想配列
        $param = [
            "user_id" => 1,
            "tag_id" => $tag,
            "title" => $title,
            "description" => $description,
            "img_path" => "sample.jpg",
            "good" => 0,
            "problem_flag" => $problem,
            "delete_flag" => 0,
        ];

        // インスタンスの作成
        $post = new Post;

        // 保存する
        $post->fill($param)->save();

        // postページにリダイレクトする
        return redirect("/post");
        
    }
}

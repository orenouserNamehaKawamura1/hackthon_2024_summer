<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Tag;

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

        return view("detail",["item" => $item,"user" => $user,"tag" => $tag]);
    }

    //いいね数を増加する関数
    public function count_increment(Request $request){
        //フォームからidを受け取る
        $id = $request->id;
        //idの投稿データを取得
        $item = Post::find($id);
        if($item) {
            $item->good += 1;
            $item->save();
        }
        
        return redirect()->route('detail', ['id' => $id]);
    }
}
